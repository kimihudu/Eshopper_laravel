<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Categorys extends Eloquent
{
    use SoftDeletes;
    //
    protected $collection="categorys";
    protected $dates = ['deleted_at'];
}
