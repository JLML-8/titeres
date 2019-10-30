<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voluntarios extends Model
{
    //
    public function horarios()
    {
        return $this->hasMany('App\Horario', 'voluntario_id');
    }

     public function eventos()
    {
        return $this->belongsToMany(Evento::class)->whitPivot('contacto');

    }


}
