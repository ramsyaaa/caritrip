<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    protected $fillable = [
        'package_name',
        'description',
        'destination_id',
        'package_key_visual',
        'have_itenary',
        'itenary_list',
        'include_list',
        'exclude_list',
        'is_popular',
        'seo_meta_description',
        'seo_meta_keywords',
        'language_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function images()
    {
        return $this->hasMany(TravelPackageImage::class, 'travel_package_id');
    }

    public function openTrips()
    {
        return $this->hasMany(TravelOpenTrip::class, 'travel_package_id');
    }
    public function privateTrips()
    {
        return $this->hasMany(TravelPrivateTrip::class, 'travel_package_id');
    }
}
