<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {

    protected $guarded = [
        'id',
    ];

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
