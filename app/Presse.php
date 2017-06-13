<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presse extends Model
{
    protected $guarded  = [
        'id',
    ];
    
    
          public function media()
    {
        return $this->hasOne('App\Media');
    }
    
    
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
