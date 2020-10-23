<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{   // recupera o id do tenant do usuário
    public function getTenantIdentify():int {
        return auth()->user()->tenant_id;
    }
    // recupera o tenant do usuário
    public function getTenant(): Tenant{
        return auth()->user()->tenant;
    }
    // verifica se o usuário é um admin, procura no array em config, tenant
    public function isAdmin(): bool{
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
