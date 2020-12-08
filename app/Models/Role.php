<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    // método para pesquisa, recebe o $filters, qué onde o usuário vai digitar a busca, o valor fica null para evitar erros
    public function search($filter = null){
        // paga o resultado, amarzena em uma variável,
        // busca o campo name ou campo description, compara com o LIKE onde é igual ao que foi digitado no campo filter
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();
        // retorna os resultados
        return $results;

    }

    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Permissões não relacionadas à este cargo
    public function permissionsAvailable($filter = null){

        $permissions = Permission::whereNotIn('permissions.id', function($query){
            $query->select('permission_role.permission_id');
            $query->from('permission_role');
            $query->whereRaw("permission_role.role_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();
        // dd($permissions);
        return $permissions;
    }
}
