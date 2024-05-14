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
    protected $fillable = ['package_id', 'trip_category', 'trip_subcategory', 'trip_name', 'trip_days', 'trip_price', 'trip_note', 'language_id'];

    

}
