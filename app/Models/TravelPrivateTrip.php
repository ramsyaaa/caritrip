<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelPrivateTrip extends Model
{
    protected $fillable = [
        'travel_package_id',
        'duration',
        'price',
        'unit',
        'pax',
    ];

    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_package_id');
    }
}
