<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    public function expenses() {
       return $this->hasMany('App\Expense');
    }

     public function users() {
        return $this->hasMany('App\User');
    }

    public function sales() {
        return $this->hasMany('App\Sale');
    }

}
