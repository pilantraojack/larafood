<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password'
    ];
}
