<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = ['ip_address', 'country', 'browser', 'url', 'access_date', 'group_page'];
}
