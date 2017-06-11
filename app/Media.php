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
    
    
      /**
     * Get the phone record associated with the user.
     */   
        public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }
}
