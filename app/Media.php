<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

    protected $table = 'medias';
    protected $guarded = [
        'id',
    ];
    
        public static function isValid($parameters) {
        // validation here
        return Validator::make($parameters, [
                    //ID
                    'id' => 'exists:album|sometimes|required',
                    //
                    'titre' => 'string|between:1,200|sometimes|required',
                    'url' => 'string|between:1,200|sometimes|required',
                    'description' => 'string|sometimes|required',
                    'auteur' => 'string|between:1,200|sometimes|required',
                    'date' => 'date|sometimes|required',
                    'description' => 'string|between:1,300|sometimes|required',
                    'url' => 'string|between:1,300|sometimes|required',
                    //CLE ETRANGERES
                    'edition_id' => 'exists:editions,id|sometimes|required',
                    'presse_id' => 'exists:editions,id|sometimes|required',
                                'edition_id' => 'exists:editions,id|sometimes|required',
                    'presse_id' => 'exists:editions,id|sometimes|required',
                                'edition_id' => 'exists:editions,id|sometimes|required',
                    'presse_id' => 'exists:editions,id|sometimes|required',
                ])->passes();
    }
    
    protected $hidden = [
            //'equipe_id', 'personne_id', 'article_id', 'sponsor_id', 'album_id', 'information_id', 'presse_id',
    ];

    public function album() {
        return $this->belongsTo('App\Album');
    }

    public function equipe() {
        return $this->belongsTo('App\Equipe');
    }

    public function artilce() {
        return $this->belongsTo('App\Article');
    }
    
        public function reseaux() {
        return $this->belongsTo('App\ResSocial');
    }

    public function personne() {
        return $this->belongsTo('App\Personne');
    }

    public function sponsor() {
        return $this->belongsTo('App\Sponsor');
    }

    public function presse() {
        return $this->belongsTo('App\Presse');
    }

    public function information() {
        return $this->belongsTo('App\Information');
    }

}
