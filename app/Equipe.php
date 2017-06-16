<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {

    protected $guarded = [
        'id',
    ];

        public static function isValid($parameters) {
        // validation here
        return Validator::make($parameters, [
                    //ID
                    'id' => 'exists:album|sometimes|required',
                    //
                    'nom' => 'string|between:1,200|sometimes|required',
                    'phrase' => 'string|between:1,200|sometimes|required',
                    //CLE ETRANGERES
                    'edition_id' => 'exists:editions,id|sometimes|required',
                ])->passes();
    }
    public function personnes() {
        return $this->belongsToMany('App\Personne')->where('archive',false);
    }

    public function edition() {
        return $this->belongsTo('App\Edition')->where('archive',false);;
    }

    public function media() {
        return $this->hasOne('App\Media');
    }

}
