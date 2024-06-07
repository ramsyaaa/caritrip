<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FullDayCruise extends Model
{
    protected $fillable = [
        'boat_travel_package_id',
        'duration',
        'price',
        'pax',
    ];

    public function boatTravelPackage()
    {
        return $this->belongsTo(BoatTravelPackage::class, 'boat_travel_package_id');
    }
}
