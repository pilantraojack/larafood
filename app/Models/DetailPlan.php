<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $table = 'details_plan';

    protected $fillable = [
        'id',
        'plan_id',
        'name'
    ];

    public function plan(){
        $this->belongsTo(Plan::class);
    }


}
