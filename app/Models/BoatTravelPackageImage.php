<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatTravelPackageImage extends Model
{
    protected $fillable = [
        'image',
        'boat_travel_package_id'
    ];

    public function package()
    {
        return $this->belongsTo(BoatTravelPackage::class, 'boat_travel_package_id');
    }
}
