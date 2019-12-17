<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone','spec_id', 'email', 'password', 'group','filename'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts(){
        return $this->hasMany('App\models\Post', 'user_id');
    }
    public function comments(){
        return $this->hasMany('App\models\Comment', 'user_id');
    }
    public function Specialty(){
        return $this->belongsTo('App\models\Specialty', 'spec_id');
    }
    public function reservs(){
        return $this->hasMany('App\models\Reserv', 'user_id');
    }
    public function videos() {
        return $this->hasMany('App\models\Video');
    }
}
