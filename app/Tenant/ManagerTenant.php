<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    public function getTenantIdentify()
    {   // verifica se o usuário está autenticado, se estiver, retorna o tenant_id, senao nao retorna nada
        return auth()->check() ? auth()->user()->tenant_id : '';
    }

    public function getTenant()
    {   // verifica se o usuário está autenticado, se estiver, retorna o tenant, senao nao retorna nada
        return auth()->check() ? auth()->user()->tenant : '';
    }
    // verifica se o usuário é um admin, procura no array em config, tenant
    public function isAdmin(): bool{
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
