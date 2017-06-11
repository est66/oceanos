<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe_Personne extends Model
{
    protected $table = 'Equipe_Personne';
    protected $guarded  = [
        'id', 'equipe_id','personne_id',
    ];
            
}
