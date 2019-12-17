<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['from', 'to', 'message', 'is_read'];
}
