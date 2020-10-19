<?php

namespace App\Tenant\Traits;

use App\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait TenantTrait {
    protected static function boot(){
        parent::boot();

        static::observe(TenantObserver::class);

        static::addGLobalScope(new TenantScope);
    }

}
