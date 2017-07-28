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

    public function posts()
    {
        return $this->hasMany(\App\Post::class, 'user_id', 'id');
    }

    /*
     * 我的粉丝
     */
    public function fans()
    {
        return $this->hasMany(\App\Fan::class, 'star_id', 'id');
    }

    /*
     * 当前这个人是否被uid粉了
     */
    public function hasFan($uid)
    {
        return $this->fans()->where('fan_id', $uid)->count();
    }

    /*
     * 我粉的人
     */
    public function stars()
    {
        return $this->hasMany(\App\Fan::class, 'fan_id', 'id');
    }

}
