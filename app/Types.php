<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public function post(){
        return $this->hasMany('App\Post');
    }
}
