<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'url',
        'price',
        'description'
    ];

    public function search($filter = null){

        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;

    }

    public function details() {

        return $this->hasMany(DetailPlan::class);
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }
}
