<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model {
    protected $table = 'informations';
    protected $guarded = [
        'id',
    ];

          public function media()
    {
        return $this->hasOne('App\Media');
    }
    
}
