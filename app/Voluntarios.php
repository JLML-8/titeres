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
        return $this->belongsToMany(Evento::class, 'evento_voluntario', 'voluntario_id', 'evento_id')->whitPivot('contacto');
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'modelo');
    }

    public function setCorreoAttribute($value)
    {
        $this->attributes['Correo'] = strtolower($value);
    }

    public function getNombreAttribute($value)
    {
        return ucwords($value);
    }
    

}
