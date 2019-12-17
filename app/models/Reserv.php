<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reserv extends Model
{
    //
    protected $fillable = [
        'name','phone','spec_id', 'email', 'date','time'
    ];
    public function user(){
        return $this->belongsTo('App\models\User', 'user_id');
    }
}
