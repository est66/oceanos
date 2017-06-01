<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    
    public function groups() 
    {
         return $this->belongsToMany('App\Group')
                 ->withTimestamps()
                 ->withPivot('role');
    }
    
}
