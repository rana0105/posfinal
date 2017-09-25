<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinvoice extends Model
{
     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }

      public function sales() 
    {
    	return $this->belongsTo('App\Sale','sale_id');
    }

    public function procategories() 
    {
    	return $this->belongsTo('App\Procategory','procategory_id');
    }
}
