<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use TenantTrait;

    protected $fillable = [
        'id',
        'tenant_id',
        'identify',
        'description'
    ];
}
