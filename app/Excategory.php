<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excategory extends Model
{
    public function expenses() {
    	return $this->hasMany('Expense');
    }

}

