<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function stocks() {
    	return $this->hasMany('Stock');
    }

    public function sinvoices() {
        return $this->hasMany('Sinvoice');
    }

     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }

    public function customers() 
    {
    	return $this->belongsTo('App\Customer','customer_id');
    }

    public function suppliers() 
    {
        return $this->belongsTo('App\Supplier','supplier_id');
    }

    public function users() 
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function outlets() 
    {
        return $this->belongsTo('App\Outlet','outlet_id');
    }
}
