<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    protected $fillable = ['content', 'user_id'];//可以使用数组注入字段

    //评论所属文章-关联文章表posts
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
