<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    //
    protected $fillable = [
    	'category_id','display','cpu','memory','main_camera','selfie_camera','battery','features','display','capacity','price','image','os','date'
    ];

    public function category($value='')
    {
    	# code...
    	return $this->belongsTo('App\Category');
    }

    public function brand($value='')
    {
    	return $this->belongsTo('App\Brand');
    }

}
