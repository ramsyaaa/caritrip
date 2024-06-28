<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    protected $fillable = ['destination_id', 'destination_image'];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
