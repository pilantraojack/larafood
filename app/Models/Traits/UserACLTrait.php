<?php

namespace App\Models\Traits;

trait UserACLTrait
{
    public function permissions(){
        // recupera o tenant desse user
        $tenant = $this->tenant;
        // recupera o plan desse tenant
        $plan = $tenant->plan;
        // cria um array de permissões
        $permissions = [];
        // percorre os perfis do plano
        foreach($plan->profiles as $profile){
            // percorre as permissoes do perfil
            foreach($profile->permissions as $permission){
                // preenche o array de permissions e mostra o nome das permissoes
                array_push($permissions, $permission->name);
            }
        }
        // retorna as permissoes
        return $permissions;
    }

    // verifica se o usuário tem permissões, retorna true or false
    public function hasPermission(String $permissionName): bool {
        return in_array($permissionName, $this->permissions());
    }

    // verifica se o email do usuário tem permissão de admin e retorna true or false
    public function isAdmin() :bool {
        return in_array($this->email, config('acl.admins'));
    }

    // verifica se o usuário é um tenant e retorna true or false
    public function isTenant() :bool {
        return !in_array($this->email, config('acl.admins'));
    }
}
