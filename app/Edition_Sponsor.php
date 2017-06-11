<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition_Sponsor extends Model
{
    protected $table = 'Edition_Sponsor';
    protected $guarded  = [
        'id', 'edition_id','sponsor_id',
    ];
            
}
