<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;


class TenantObserver{
    /**
     * Handle the category "creating" event.
     *
     * @param Model $model
     * @return void
     */
    // TODO: Pode ser comentado este cara, em tese. Fazer testes
    public function creating(Model $model)
    {
        // Verificar este código
        $managerTenant = app(ManagerTenant::class);
        $identify = $managerTenant->getTenantIdentify();

        if($identify)
            $model->tenant_id = $identify;
    }
}
