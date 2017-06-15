<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
        protected $guarded = [
        'id',
    ];
        
        
            public function editions() 
    {
         return $this->belongsToMany('App\Edition')->where('archive',false)
                 ->withTimestamps();
    }
    
    
          public function media()
    {
        return $this->hasOne('App\Media')->where('archive',false);;
    }
}
