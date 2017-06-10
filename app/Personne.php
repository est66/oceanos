<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model {

    protected $guarded = [
        'id',
    ];
    
        public function equipes() 
    {
         return $this->belongsToMany('App\Equipe')
                 ->withTimestamps();
    }

}
