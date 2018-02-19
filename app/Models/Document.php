<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = "documents";

    public function type()
    {
        return $this->belongsTo('App\Models\DocumentType','document_type_id');
    }
}
