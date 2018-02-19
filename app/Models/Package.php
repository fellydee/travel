<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "packages";

    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id');
    }

    public function package()
    {
        return $this->hasMany('App\Models\Order','package_id');
    }
}
