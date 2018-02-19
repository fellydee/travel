<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function package()
{
    return $this->belongsTo('App\Models\Package','package_id');
}
}
