<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded  = [
        'id', 
    ];
    
    
   /* public static function isValid($parameters)
    {        
        // validation here
        return Validator::make($parameters, [
            //ID
            'id'      => 'required',
            //
            'position' => 'nullable',
            'nom'   => 'string|between:1,200|sometimes|required',
            'description'   => 'string|between:1,350|sometimes|required',
            'edition_id' => 'exists:editions,id|sometimes|required',
        ])->passes();        
    }
     */
    public function album()
    {
        return $this->belongsTo('App\Edition');
    }
   
}
