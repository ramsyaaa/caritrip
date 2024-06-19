<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'id_category');
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'id_category', 'featured_image', 'slug', 'content', 'meta_description', 'meta_keywords'];



}
