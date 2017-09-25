<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	public function accounts() {
    	return $this->hasMany('Account');
    }

    public function sales() {
    	return $this->hasMany('Sale');
    }


    public function customertypes() 
    {
    	return $this->belongsTo('App\Customertype','type_id');
    }
}
