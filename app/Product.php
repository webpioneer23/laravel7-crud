<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subsidiary(){
        return $this->belongsTo('App\User','subsidiary_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id');
    }
}
