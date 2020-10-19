<?php

namespace App\Tenant\Traits;

use App\Observers\TenantObserver;

trait TenantTrait {
    protected static function boot(){
        parent::boot();

        static::observe(TenantObserver::class);
    }

}
