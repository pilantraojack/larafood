<?php

namespace App\Models;

use App\Models\Profile;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
