<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }
    
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
}
