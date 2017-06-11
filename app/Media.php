<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

    protected $table = 'medias';
    protected $guarded = [
        'id',
    ];
    protected $hidden = [
        'equipe_id', 'personne_id', 'article_id', 'sponsor_id', 'album_id', 'information_id', 'presse_id',
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
