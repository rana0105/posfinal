<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function package_stocks() {
        return $this->hasMany('PackageStock');
    }

    public function package_sales() {
        return $this->hasMany('PackageSale');
    }

     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }

     public function pack_cates() 
    {
    	return $this->belongsTo('App\PackCate','pacate_id');
    }
}
