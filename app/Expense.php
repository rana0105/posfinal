<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    public function outlets() 
    {
    	return $this->belongsTo('App\Outlet','outlet_id');
    }

    public function excategories() 
    {
    	return $this->belongsTo('App\Excategory','excate_id');
    }
}
