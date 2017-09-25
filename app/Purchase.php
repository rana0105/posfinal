<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function stocks() {
    	return $this->hasMany('Stock');
    }

     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }

    public function suppliers() 
    {
    	return $this->belongsTo('App\Supplier','supplier_id');
    }
}
