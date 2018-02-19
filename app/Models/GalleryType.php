<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryType extends Model
{
    protected $table = "gallerytypes";

    public function gallery()
    {
        return $this->hasMany('App\Models\Gallery','gallery_type_id');
    }
}
