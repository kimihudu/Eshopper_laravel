<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Products extends Eloquent
{
    use SoftDeletes;
    //
    protected $collection = "products";
    protected $dates = ['deleted_at'];
}
