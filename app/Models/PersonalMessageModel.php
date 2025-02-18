<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalMessageModel extends Model
{
    protected $table = 'personal_message';
    protected $fillable = ['sender_name', 'sender_email', 'sender_message', 'anonymous', 'send_date'];
}
