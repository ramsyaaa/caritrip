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
    protected $fillable = ['package_name', 'boat_id', 'package_key_visual', 'package_short_description', 'package_description', 'location', 'have_itenary', 'itenary_list', 'include_list', 'exclude_list', 'seo_meta_description', 'seo_meta_keywords', 'highlight_video', 'language_id'];



}
