<?php

namespace App;

##use Illuminate\Database\Eloquent\Model;
use App\Model;

class Fan extends Model
{
    //粉丝用户 1对1
    public function fuser()
    {
        return $this->hasOne(\App\User::class,'id','fan_id');
        //return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
        
    }

    //被关注用户
    public function Suser()
    {
        return $this->hasOne(\App\User::class,'id','star_id');
        //return $this->hasOne('App\Phone', 'foreign_key', 'local_key');

    }

}
