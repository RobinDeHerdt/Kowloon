<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
