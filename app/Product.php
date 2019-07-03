<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category ()
    {
        return $this->belongsTe(Category::class);
    }
}