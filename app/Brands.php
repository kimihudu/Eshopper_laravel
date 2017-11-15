<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Brands extends Eloquent
{
    //
    protected $collection="brands";
}
