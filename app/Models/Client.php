<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'email',
        'email_verified_at',
        'password'
    ];
}
