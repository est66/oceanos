<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Edition extends Model {

    protected $guarded = [
        'id',
    ];
    
    
        protected $dates = [
        'created_at',
        'updated_at',
        'date',
    ];
    
    protected $appends = ['timestamps'];

    public function getTimestampsAttribute() {
        return (new Carbon($this->date))->timestamp;
    }
    
    //protected $dateFormat = 'Y-m-d';

    public static function isValid($parameters) {
        // validation here
        return Validator::make($parameters, [
                    //ID
                    'id' => 'exists:album|sometimes|required',
                    //
                    'date' => 'date|sometimes|required',
                    'description' => 'string|between:1,300|sometimes|required',
                    'resultats' => 'string|between:1,200|sometimes|required',
                    'enjeu' => 'string|between:1,200|sometimes|required',
                    'nbBateau' => 'string|between:1,200|sometimes|required',
                    'lieu' => 'string|between:1,200|sometimes|required',
                    //ARCHIVE
                    'archive' => 'boolean|sometimes|required',
                    //CLE ETRANGERES
                    'edition_id' => 'exists:editions,id|sometimes|required',
                ])->passes();
    }

    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function equipes() {
        return $this->hasMany('App\Equipe')->where('archive',false);
    }

    public function sponsors() {
        return $this->belongsToMany('App\Sponsor')
                        ->withTimestamps();
    }

    public function personnes() {
        return $this->hasMany('App\Personne')->where('archive',false);
    }

    public function albums() {
        return $this->hasMany('App\Album')->where('archive',false);;
    }

    public function budgets() {
        return $this->hasMany('App\Budget')->where('archive',false);;
    }

}
