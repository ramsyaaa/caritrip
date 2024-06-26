<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatTravelPackage extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boat_travel_packages';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
    public function boat()
    {
        return $this->belongsTo(Boat::class, 'boat_id');
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function images()
    {
        return $this->hasMany(BoatTravelPackageImage::class, 'boat_travel_package_id');
    }

    public function openTrips()
    {
        return $this->hasMany(OpenTrip::class, 'boat_travel_package_id');
    }
    public function privateTrips()
    {
        return $this->hasMany(PrivateTrip::class, 'boat_travel_package_id');
    }
    public function fullDayCruises()
    {
        return $this->hasMany(FullDayCruise::class, 'boat_travel_package_id');
    }

    protected $fillable = [
        'package_name',
        'boat_id',
        'destination_id',
        'package_key_visual',
        'trip_subcategory',
        'have_itenary',
        'itenary_list',
        'include_list',
        'exclude_list',
        'is_popular',
        'seo_meta_description',
        'seo_meta_keywords',
        'language_id',
    ];



}
