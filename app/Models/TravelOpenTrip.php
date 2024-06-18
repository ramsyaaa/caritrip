<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelOpenTrip extends Model
{
    protected $fillable = [
        'travel_package_id',
        'duration',
        'price',
    ];
}
