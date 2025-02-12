<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryImageModel extends Model
{
    use HasFactory;
    protected $table = 'temp_image';
    protected $fillable = ['folder', 'filename'];
}
