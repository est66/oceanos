<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {
protected $table = 'medias';
    protected $guarded = [
        'id',
    ];
    public function album() {
        return $this->belongsTo('App\Album');
    }
     
        public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }
    
        public function artilce()
    {
        return $this->belongsTo('App\Article');
    }    
    
            public function personne()
    {
        return $this->belongsTo('App\Personne');
    }
    
            public function sponsor()
    {
        return $this->belongsTo('App\Sponsor');
    }
    
            public function presse()
    {
        return $this->belongsTo('App\Presse');
    }
    
            public function information()
    {
        return $this->belongsTo('App\Information');
    }
    

}
