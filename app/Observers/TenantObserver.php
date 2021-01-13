<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Tenant;
use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    /**
     * Handle the tenant "create" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Model $model)
    {
        // 011brasil code para fazer funcionar.
        if($model instanceof  Tenant){
            $model->uuid = Str::uuid();
            $model->url  = Str::kebab($model->name);
        }else{
            // Verificar este código
            $managerTenant = app(ManagerTenant::class);
            $identify = $managerTenant->getTenantIdentify();

            if($identify)
                $model->tenant_id = $identify;
        }
    }

    /**
     * Handle the tenant "updating" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function updating(Model $model)
    {
        // $tenant->url = Str::kebab($tenant->name);
        if($model instanceof  Tenant){
            $model->uuid = Str::uuid();
            $model->url  = Str::kebab($model->name);
        }else{
            // Verificar este código
            $managerTenant = app(ManagerTenant::class);
            $identify = $managerTenant->getTenantIdentify();

            if($identify)
                $model->tenant_id = $identify;
        }
    }
}
