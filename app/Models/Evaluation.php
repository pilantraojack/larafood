<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'order_evaluations';

    protected $fillable = [
        'id',
        'order_id',
        'client_id',
        'stars',
        'comment'
    ];

    public function order()
    {
        return $this->belongsto(Client::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
