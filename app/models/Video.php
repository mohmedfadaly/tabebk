<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = [
        'name' ,
        'des' ,
        'meta_des' ,
        'meta_keywords' ,
        'user_id' ,
        'video',
        'image'
    ];
    public function user(){
        return $this->belongsTo('App\models\User');
    }
}
