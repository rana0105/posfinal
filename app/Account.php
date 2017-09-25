<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }

     public function customers() 
    {
    	return $this->belongsTo('App\Customer','customer_id');
    }

     public function sales() 
    {
    	return $this->belongsTo('App\Sale','sale_id');
    }
}
