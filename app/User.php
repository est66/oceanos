<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at'
    ];   

    public function groups() 
    {
         return $this->belongsToMany('App\Group')
                 ->withTimestamps();
    }
    
    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function hasRole($roleLabel, $ressourceLabel)
    {               
        
        foreach ($this->groups as $group) {
            if ($group->hasRole($roleLabel, $ressourceLabel)) {
                return true;
            }
        }
        return false;
    }
}
