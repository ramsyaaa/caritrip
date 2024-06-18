<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelPrivateTrip extends Model
{
    protected $fillable = [
        'travel_package_id',
        'duration',
        'price',
        'pax',
    ];
}
