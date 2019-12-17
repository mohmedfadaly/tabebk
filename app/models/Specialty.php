<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
       //
       protected $fillable = [
        'name', 'meta_keywords', 'meta_des',
    ];
    public function user() {
        return $this->hasMany('App\models\User', 'spec_id');
    }

}
