<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model {

    protected $guarded = [
        'id',
    ];
    protected $hidden = [
        'pivot',
    ];

    public function equipes() {
        return $this->belongsToMany('App\Equipe')->where('archive',false);
    }

    public function edition() {
        return $this->belongsTo('App\Edition')->where('archive',false);
    }

    public function media() {
        return $this->hasOne('App\Media')->where('archive',false);
    }

}
