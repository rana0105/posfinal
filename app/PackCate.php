<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackCate extends Model
{
    public function packages() {
        return $this->hasMany('Package');
    }

    public function package_stocks() {
        return $this->hasMany('PackageStock');
    }

    public function package_sales() {
        return $this->hasMany('PackageSale');
    }
}
