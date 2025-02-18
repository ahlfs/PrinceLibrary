<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class WritingModel extends Model
{
    use HasFactory;
    protected $table = 'writing';
    protected $fillable = ['page_id','title', 'content', 'conten_english', 'image', 'view_encounter'];
}
