<?php

namespace App;

use Illuminate\Database\Eloquent\Model AS BaseModel;

class Model extends BaseModel
{
    //
    protected $guarded = [];//不可注入的字段
}
