<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function stocks() {
    	return $this->hasMany('App\Stock');
    }

    public function purchases() {
    	return $this->hasMany('App\Purchase');
    }

    public function back_products() {
        return $this->hasMany('App\BackProduct');
    }

    public function sales() { 
        return $this->hasMany('App\Sale');
    }

    public function packages() {
        return $this->hasMany('App\Package');
    }

    public function package_sales() {
        return $this->hasMany('App\PackageSale');
    }

    public function package_stocks() {
        return $this->hasMany('App\PackageStock');
    }

    public function sinvoices() {
        return $this->hasMany('App\Sinvoice');
    }

    public function procategories() 
    {
    	return $this->belongsTo('App\Procategory','procategory_id');
    }

    public function brands() 
    {
    	return $this->belongsTo('App\Brand','brand_id');
    }
    public function getTotalPrice($sale_price,$discount,$tax,$qnt){
        $amount =  ($qnt*$sale_price) - ($qnt*$sale_price*$discount)/100;
        
        $sstotal = (100+$tax)/100;
        $stotal = $amount*$sstotal;
        return $stotal;
    }
}
