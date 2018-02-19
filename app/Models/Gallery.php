<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "gallerys";

    public function type()
    {
        return $this->belongsTo('App\Models\GalleryType','gallery_type_id');
    }
}
