<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model {

    protected $table = 'informations';
    protected $guarded = [
        'id',
    ];

    public static function isValid($parameters) {
        // validation here
        return Validator::make($parameters, [
                    //ID
                    'id' => 'exists:album|sometimes|required',
                    //
                    'nom' => 'string|between:1,200|sometimes|required',
                ])->passes();
    }

    public function media() {
        return $this->hasOne('App\Media');
    }

}
