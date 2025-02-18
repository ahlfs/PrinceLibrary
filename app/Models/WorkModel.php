<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class WorkModel extends Model
{
    use HasFactory;
    protected $table = 'work';
    protected $fillable = ['page_id', 'title', 'content', 'image', 'category', 'view_encounter', 'button_text', 'download_file', 'github_link', 'web_link', 'youtube_link'];
}
