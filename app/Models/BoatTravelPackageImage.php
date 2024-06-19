<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatTravelPackageImage extends Model
{
    protected $fillable = [
        'image',
        'boat_travel_package_id'
    ];
}
