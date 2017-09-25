<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageSale extends Model
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

     public function packages() 
    {
    	return $this->belongsTo('App\Package','package_id');
    }

    public function pack_cates() 
    {
    	return $this->belongsTo('App\PackCate','pacate_id');
    }

}
