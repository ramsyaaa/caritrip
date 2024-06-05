<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatTravelTrip extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boat_travel_trips';

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

    public function images()
    {
        return $this->hasMany(BoatTravelTripImage::class, 'trip_id');
    }

    public function package()
    {
        return $this->belongsTo(BoatTravelPackage::class, 'package_id');
    }

    protected $fillable = ['package_id', 'trip_category', 'trip_subcategory', 'trip_name', 'trip_days', 'trip_price', 'trip_note', 'language_id'];



}
