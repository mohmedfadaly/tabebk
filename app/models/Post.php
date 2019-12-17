<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id' , 'post'];
    public function user(){
        return $this->belongsTo('App\models\User' , 'user_id');
    }
    public function comments(){
        return $this->hasMany('App\models\Comment' , 'post_id');
    }
}
