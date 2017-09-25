<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function purchases() {
    	return $this->hasMany('Purchase');
    }

    public function sales() {
    	return $this->hasMany('Sale');
    }
}
