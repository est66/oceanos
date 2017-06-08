<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

    protected $guarded = [
        'id',
    ];
    public function album() {
        return $this->belongsTo('App\Album');
    }
}