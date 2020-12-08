<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
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

    public function plans(){
        return $this->belongsToMany(Plan::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    // Permissões não relacionadas à este perfil
    public function permissionsAvailable($filter = null){

        $permissions = Permission::whereNotIn('permissions.id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
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
