<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procategory extends Model
{
    public function products() {
    	return $this->hasMany('App\Product');
    }

    public function stocks() {
    	return $this->hasMany('App\Stock');
    }

    public function packages() {
        return $this->hasMany('App\Package');
    }

    public function sinvoices() {
        return $this->hasMany('App\Sinvoice');
    }
}
