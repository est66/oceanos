<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model {

    protected $guarded = [
        'id',
    ];

    public function edition() {
        return $this->belongsTo('App\Edition');
    }

}
