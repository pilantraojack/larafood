<?php

namespace App\Tenant;

use App\Models\Tenant;
use phpDocumentor\Reflection\Types\Boolean;

class ManagerTenant{
    public function getTenantIdentify(){
        auth()->user()->tenant_id;
    }

    public function getTenant(): Tenant{
        return auth()->user()->tenant;
    }

    public function isAdmin(): bool{
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
