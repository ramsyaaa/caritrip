<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateTrip extends Model
{
    protected $fillable = [
        'boat_travel_package_id',
        'extra_pax_price',
        'duration',
        'price',
        'unit',
        'pax',
    ];


    public function boatTravelPackage()
    {
        return $this->belongsTo(BoatTravelPackage::class, 'boat_travel_package_id');
    }
}
