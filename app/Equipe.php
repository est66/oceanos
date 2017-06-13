<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {

    protected $guarded = [
        'id',
    ];

    public function personnes() {
        return $this->belongsToMany('App\Personne');
    }

    public function edition() {
        return $this->belongsTo('App\Edition');
    }

    public function media() {
        return $this->hasOne('App\Media');
    }

}
