<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $guarded  = [
        'id', 'edition_id',
    ];
    
    //protected $dateFormat = 'Y-m-d';

    public static function isValid($parameters) {
        // validation here
        return Validator::make($parameters, [
                    //ID
                    'id' => 'exists:album|sometimes|required',
                    //
                    'date' => 'date|sometimes|required',
                    'description' => 'string|between:1,300|sometimes|required',
                    'resultats' => 'string|between:1,200|sometimes|required',
                    'enjeu' => 'string|between:1,200|sometimes|required',
                    'nbBateau' => 'string|between:1,200|sometimes|required',
                    'lieu' => 'string|between:1,200|sometimes|required',
                    //ARCHIVE
                    'archive' => 'boolean|sometimes|required',
                    //CLE ETRANGERES
                    'edition_id' => 'exists:editions,id|sometimes|required',
                ])->passes();
    }

        public function articles()
    {
        return $this->hasMany('App\Article');
    }
    
            public function equipes()
    {
        return $this->hasMany('App\Equipe');
    }
    
    
        public function sponsors() 
    {
         return $this->belongsToMany('App\Sponsor')
                 ->withTimestamps();
    }
    
    
        public function personnes()
    {
        return $this->hasMany('App\Personne');
    }
}
