<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['country_id', 'name', 'destination_image', 'description', 'is_international'];

    public function images()
    {
        return $this->hasMany(DestinationImage::class, 'destination_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
