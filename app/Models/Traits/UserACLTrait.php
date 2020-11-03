<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    public function permissions(): array{
        $permissionsPlan =  $this->permissionsPlan();
        $permissionsRole =  $this->permissionsRole();

        $permissions = [];
        foreach($permissionsRole as $permissionRole) {
            if(in_array($permissionRole, $permissionsPlan))
                array_push($permissions, $permissionsPlan);
        }

        return $permissions;
    }

    // método que retorna as permissoes do plano
    public function permissionsPlan(): array {
        // recupera o tenant com o plano, os perfis do plano, e as permissoes do perfil
        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

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
    // método que retorna as permissoes do cargo
    public function permissionsRole(): array {
        // recupera as permissoes de um cargo
        $roles = $this->roles()->with('permissions')->get();
        // cria um array vazio para receber as permissoes
        $permissions = [];
        // recupera as permissoes dos cargos e joga para dentro do array de permissoes
        foreach($roles as $role){
            foreach($role->permissions as $permission) {
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
