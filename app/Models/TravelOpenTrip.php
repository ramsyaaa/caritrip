<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelOpenTrip extends Model
{
    protected $fillable = [
        'travel_package_id',
        'date',
        'duration',
        'price',
    ];

    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_package_id');
    }
}
