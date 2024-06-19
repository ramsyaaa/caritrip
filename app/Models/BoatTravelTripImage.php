<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatTravelTripImage extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boat_travel_trip_images';

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

    public function package()
    {
        return $this->belongsTo(BoatTravelPackage::class, 'package_id');
    }

    public function trip()
    {
        return $this->belongsTo(BoatTravelTrip::class, 'trip_id');
    }

    protected $fillable = ['package_id', 'trip_id', 'images'];



}
