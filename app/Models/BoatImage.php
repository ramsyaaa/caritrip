<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatImage extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boat_images';

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

    public function boat()
    {
        return $this->belongsTo(Boat::class, 'boat_id');
    }

    protected $fillable = ['boat_id', 'image_name', 'image_description', 'key_visual'];



}
