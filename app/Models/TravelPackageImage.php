<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelPackageImage extends Model
{
    protected $fillable = [
        'image',
        'travel_package_id'
    ];

    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_package_id');
    }
}
