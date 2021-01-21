<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    public function permissions(): array
    {
        // dd($this->permissionsPlan());
        // dd($this->permissionsRole());
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan))
                array_push($permissions, $permission);
        }
        // dd($permissions);
        return $permissions;
    }

    // método que retorna as permissoes do plano
    public function permissionsPlan(): array
    {

        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    // verifica se o usuário tem permissões, retorna true or false
    public function hasPermission(string $permissionName): bool {
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
