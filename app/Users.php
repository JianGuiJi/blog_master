<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';
    protected $guarded; //不可以使用数组注入字段
    protected $fillable=['name','email','password'];//可以使用数组注入字段
}
