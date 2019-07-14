<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function defaultImage () 
    {
        $photo = json_decode ($this->photos);
        return $photo[0];
    }

    public function photos () 
    {
        $photos = json_decode ($this->photos);
        return $photos;
    }
}
