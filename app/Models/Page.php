<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

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
    protected $fillable = ['page_title', 'page_breadcrumbs_title', 'page_og_image', 'page_banner_image', 'page_meta_description', 'page_friendly_url', 'page_meta_keywords', 'page_category', 'language_id'];

    

}
