<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
    /**
     * Handle the tenant "create" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function create(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::kebab($tenant->name);
    }

    /**
     * Handle the tenant "updating" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function update(Tenant $tenant)
    {
        $tenant->url = Str::kebab($tenant->name);
    }
}
