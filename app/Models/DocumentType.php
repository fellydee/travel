<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
   protected $table = "documenttypes";

    public function document()
    {
        return $this->hasMany('App\Models\Document','document_type_id');
    }
}
