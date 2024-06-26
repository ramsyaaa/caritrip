<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    protected $fillable = [
        'boat_id',
        'name',
        'amount',
        'description',
        'image',
    ];

    public function boat()
    {
        return $this->belongsTo(Boat::class, 'boat_id');
    }
}
