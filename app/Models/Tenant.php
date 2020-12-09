<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenants';

    protected $dates = [
        'subscription',
        'expires_at',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'id',
        'uuid',
        'plan_id',
        'cnpj',
        'name',
        'url',
        'email',
        'logo',
        'active',
        'subscription',
        'expires_at',
        'sub_id',
        'sub_active',
        'sub_suspended'

    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

}
