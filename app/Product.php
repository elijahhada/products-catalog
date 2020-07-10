<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Catalog;

class Product extends Model
{
    protected $guarded = [];

    public function catalog()
    {
        return $this->belongsTo('App\Catalog');
    }
}
