<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boats';

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
    public function packages()
    {
        return $this->hasMany(BoatTravelPackage::class, 'boat_id');
    }
    public function images()
    {
        return $this->hasMany(BoatImage::class, 'boat_id');
    }
    public function cabins()
    {
        return $this->hasMany(Cabin::class, 'boat_id');
    }

    protected $fillable = ['boat_name', 'boat_length', 'boat_width', 'boat_depth', 'boat_speed', 'boat_year_built', 'boat_fuel_capacity', 'boat_water_capacity', 'boat_origin', 'boat_material', 'boat_main_engine', 'boat_dingy', 'boat_safety_equipment', 'boat_facility', 'boat_capacity', 'boat_entertainment', 'boat_featured_image', 'seo_meta_description', 'seo_meta_keywords', 'language_id', 'highlight_video'];



}
