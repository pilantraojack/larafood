<?php

namespace App\Models\Traits;

trait UserACLTrait
{
    public function permissions(){
        // recupera o tenant desse user
        $tenant = $this->tenant();
        // recupera o plan desse tenant
        $plan = $tenant->plan;
        // cria um array de permissões
        $permissions = [];

        foreach($plan->profiles as $profile){
            foreach($profile->permissions as $permission){
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }
}
