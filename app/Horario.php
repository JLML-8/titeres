<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //

    public function voluntario()
    {
        return $this->belongsTo(Voluntarios::class, 'voluntario_id');
    }
    
}
