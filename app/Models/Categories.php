<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Categories extends Eloquent
{
    protected $collection = 'categories';
    protected $connection = 'mongodb';
}