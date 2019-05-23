<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $table = 'posts';
	public $primaryKey = 'id';
	public $timestamps = true;

    public function user(){
    	return $this->belongsTo('App\User');
    }
   public function type(){
    	return $this->belongsTo('App\Types');
    }
    public function image(){
        return $this->hasMany('App\Image');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    
}
