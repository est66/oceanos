<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $guarded  = [
        'id', 'edition_id',
    ];
    

//    public static function isValid($parameters) {
//        // validation here
//        return Validator::make($parameters, [
//                    //ID
//                    'id' => 'exists:album|sometimes|required',
//                    //
//                    'titre' => 'string|between:1,200|sometimes|required',
//                    'soustitre' => 'string|between:1,200|sometimes|required',
//                    'type' => 'string|sometimes|required',
//                    'auteur' => 'string|between:1,200|sometimes|required',
//                    'date' => 'date|sometimes|required',
//                    'description' => 'string|between:1,300|sometimes|required',
//                    'visible' => 'boolean|sometimes|required',
//                    'archive' => 'boolean|sometimes|required',
//                    //CLE ETRANGERES
//                    'edition_id' => 'exists:editions,id|sometimes|required',
//                ])->passes();
//    }


        public function edition()
    {
        return $this->belongsTo('App\Edition');
    }
    
    
            public function medias()
    {
        return $this->hasMany('App\Media');
    }

}
