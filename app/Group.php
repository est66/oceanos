<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    
    public function users() 
    {
         return $this->belongsToMany('App\User')
                 ->withTimestamps();
    }
    
    public function resources() 
    {
         return $this
                 ->belongsToMany('App\Resource')
                 ->withTimestamps()
                 ->withPivot('role');
    }
    
    public function hasRole($roleLabel, $resourceLabel)
    {               
        $resources = $this->resources()
                        ->wherePivot('role', '=', $roleLabel)
                        ->get(); 
        foreach ($resources as $resource) {
            if ($resource->name == $resourceLabel) {
                return true;
            }
        }
        return false;
    }
    
}
