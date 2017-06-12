<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $guarded  = [
        'id', 'edition_id',
    ];

    public static function isValid($parameters) {
        // validation here
        return Validator::make($parameters, [
                    //ID
                    'id' => 'exists:album|sometimes|required',
                    //
                    'date' => 'date|sometimes|required',
                    'description' => 'string|between:1,300|sometimes',
                    'resultats' => 'string|between:1,200|sometimes|required',
                    'enjeu' => 'string|between:1,200|sometimes|required',
                    'nbBateau' => 'string|between:1,200|sometimes|required',
                    'lieu' => 'string|between:1,200|sometimes|required',
                    //ARCHIVE
                    'archive' => 'boolean|sometimes|required',
                ])->passes();
    }

        public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
