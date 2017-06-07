<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body',
    ];
    
    
    public static function isValid($parameters)
    {        
        // validation here
        return Validator::make($parameters, [
            'id'      => 'exists:news|sometimes|required',
            'title'   => 'string|between:1,200|sometimes|required',
            'body'    => 'string|between:1,10000|sometimes|required',
            'user_id' => 'exists:users,id|sometimes|required',
        ])->passes();        
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
