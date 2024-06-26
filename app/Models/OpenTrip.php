<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenTrip extends Model
{
    protected $fillable = [
        'boat_travel_package_id',
        'cabin_id',
        'duration',
        'price',
        'extra_bed_price',
    ];

    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabin_id');
    }

    public function boatTravelPackage()
    {
        return $this->belongsTo(BoatTravelPackage::class, 'boat_travel_package_id');
    }
}
