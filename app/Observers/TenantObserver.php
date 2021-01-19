<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Tenant;

class TenantObserver
{
    /**
     * Handle the tenant "create" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    // no laravel 7 é created, e nao creating
    public function created(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::kebab($tenant->name);
    }

    /**
     * Handle the tenant "update" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function updated(Tenant $tenant)
    {
        $tenant->url = Str::kebab($tenant->name);
    }
}

// public function updating(Model $model)
    // {
    //     // $tenant->url = Str::kebab($tenant->name);
    //     if($model instanceof  Tenant){
    //         $model->uuid = Str::uuid();
    //         $model->url  = Str::kebab($model->name);
    //     }else{
    //         // Verificar este código
    //         $managerTenant = app(ManagerTenant::class);
    //         $identify = $managerTenant->getTenantIdentify();

    //         if($identify)
    //             $model->tenant_id = $identify;
    //     }
    // }

    // public function creating(Model $model)
    // {
    //     // 011brasil code para fazer funcionar.
    //     if($model instanceof  Tenant){
    //         $model->uuid = Str::uuid();
    //         $model->url  = Str::kebab($model->name);
    //     }else{
    //         // Verificar este código
    //         $managerTenant = app(ManagerTenant::class);
    //         $identify = $managerTenant->getTenantIdentify();

    //         if($identify)
    //             $model->tenant_id = $identify;
    //     }
    // }
