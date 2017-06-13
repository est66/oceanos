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
        return $this->belongsToMany('App\Equipe');
    }

    public function edition() {
        return $this->belongsTo('App\Edition');
    }

    public function media() {
        return $this->hasOne('App\Media');
    }

}
