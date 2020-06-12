<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  
    public function subsidiary(){
        return $this->belongsTo('App\User','subsidiary_id');
    }

}
