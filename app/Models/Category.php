<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use TenantTrait;

    protected $fillable = [
        'name',
        'url',
        'description'
    ];

    protected static function boot(){
        parent::boot();

        static::observe(TenantObserver::class);
    }

    public function products(){
        $this->belongsToMany(Product::class);
    }
}



