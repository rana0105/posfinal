<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageStock extends Model
{
	public function products() 
    {
    	return $this->belongsTo('App\Product', 'propac_id', 'product_id');
    }

    //  public function products() 
    // {
    // 	return $this->belongsTo('App\Product','product_id');
    // }

      public function packages() 
    {
    	return $this->belongsTo('App\Package','package_id');
    }
}
