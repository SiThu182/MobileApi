<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','brand_id','type_id'];

    public function specification($value='')
    {
    	# code...
    	return $this->hasMany('App\Specification');
    }

    public function brand($value='')
    {
    	# code...
    	return $this->belongsTo('App\Brand');
    }

    public function type($value='')
    {
    	# code...
    	return $this->belongsTo('App\Type');
    }


  
}
