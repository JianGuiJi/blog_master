<?php

namespace App;

use Illuminate\Database\Eloquent\Model AS EloquentModel;

class Model extends EloquentModel
{
    //
    protected $guarded = [];//不可注入字段为空
}
