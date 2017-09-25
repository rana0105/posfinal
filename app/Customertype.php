<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customertype extends Model
{
    public function customers() {
    	return $this->hasMany('Customer');
    }
}
 