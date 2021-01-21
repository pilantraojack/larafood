<?php

namespace App\Tenant\Observers;

use App\Models\Tenant;
use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    // public function creating(Tenant $tenant)
    // {
    //     $managerTenant = app(ManagerTenant::class);
    //     $identify = $managerTenant->getTenantIdentify();

    //     if ($identify)
    //         $tenant->tenant_id = $identify;
    // }
}
