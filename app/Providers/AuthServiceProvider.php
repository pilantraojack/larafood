<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // traz a lista de todas as permissões cadastradas
        $permissions = Permission::all();
        // verifica se o usuário tem uma permissão específica
        foreach($permissions as $permission) {
            Gate::define($permission->name, function(User $user) use ($permission){
                return $user->hasPermission($permission->name);
            });
        }
        // define o que o usuário pode editar, registrar, etc
        Gate::define('owner', function(User $user, $object){
            return $user->id === $object->user_id;
        });
        // o método before faz uma verificação antes dos outros métodos
        Gate::before(function (User $user){
            // se o usuário for admin, retorna true e nao faz as outras verificações, se retornar false ele faz
            if($user->isAdmin()){
                return true;
            }
        });
    }
}
