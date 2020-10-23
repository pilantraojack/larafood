<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;


class TenantObserver{
    /**
     * Handle the category "create" event.
     *
     * @param Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function create(Model $model)
    {
        $managerTenant = app(ManagerTenant::class);

        $model->tenant_id = $managerTenant->getTenantIdentify();
    }
}
