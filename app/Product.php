<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function productimages()
    {
        return $this->hasMany('App\Productimage');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'product_tag', 'product_id', 'tag_id');
    }

    public function hotitems()
    {
        return $this->hasMany('App\Hotitem');
    }
}
