<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model {

    protected $guarded = [
        'id',
    ];

          public function media()
    {
        return $this->hasOne('App\Media');
    }
    
}
