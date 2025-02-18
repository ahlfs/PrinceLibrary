<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    protected $table = 'home';
    protected $fillable = ['web_name', 'category', 'status', 'web_link', 'visit', 'web_image'];
}
