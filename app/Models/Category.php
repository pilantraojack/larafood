<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use TenantTrait;

    protected $fillable = [
        'id',
        'tenant_id',
        'uuid',
        'name',
        'url',
        'description'
    ];

    protected static function boot(){
        parent::boot();

        static::observe(TenantObserver::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}



