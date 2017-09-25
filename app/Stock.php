<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Notifiable;
     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }

     public function purchases() 
    {
    	return $this->belongsToMany('App\Purchase');
    }

     public function procategories() 
    {
    	return $this->belongsTo('App\Procategory','procategory_id');
    }
}
