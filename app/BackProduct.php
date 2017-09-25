<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackProduct extends Model
{
    public function stocks() {
    	return $this->hasMany('Stock');
    }

     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }
}
