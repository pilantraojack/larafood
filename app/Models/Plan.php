<?php

namespace App\Models;
use App\Models\DetailPlan;
use App\Models\Tenant;
use App\Models\Profile;

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

    public function tenants(){
        return $this->hasMany(Plan::class);
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }

    // pega os perfis que não estão relacionados à este plano
    public function profilesAvailable($filter = null){

        $profiles = Profile::whereNotIn('profiles.id', function($query){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();
        // dd($permissions);
        return $profiles;
    }



}
