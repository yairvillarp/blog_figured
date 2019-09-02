<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Article extends Eloquent
{
    protected $collection = 'articles';
    protected $connection = 'mongodb';

    public function Category(){
        return $this->belongsTo('App\Models\Categories', 'categories_id');
    }
}