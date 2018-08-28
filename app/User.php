<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * 一对一关系
     */
    public function userinfo()
    {
        return $this->hasOne('App\Userinfo');
    }

    /**
     * 一对多
     */
    public function news()
    {
        return $this->hasMany('App\News');
    }

    /**
     * 属于关系
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
