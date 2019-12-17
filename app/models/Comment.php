<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['user_id' , 'post_id' , 'comment'];
    public function user(){
        return $this->belongsTo('App\models\User', 'user_id');
    }
    public function posts(){
        return $this->belongsTo('App\models\Post', 'post_id');
    }
}
