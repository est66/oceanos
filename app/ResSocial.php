<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResSocial extends Model {

    protected $table = 'res_social';
    protected $guarded = [
        'id',
    ];

    public function media() {
        return $this->hasOne('App\Media');
    }

}
