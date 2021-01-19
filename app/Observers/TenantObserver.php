<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    /**
     * Handle the tenant "create" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    // no laravel 7 é created, e nao creating
    // public function updated(Model $model)
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

    public function created(Model $model)
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
}
