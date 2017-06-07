<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
            protected $guarded  = [
        'id', 'edition_id','equipe_id',
    ];
}
