<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blogs";

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory','category_id');
    }
}
