<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Evento extends Model
{

    use SoftDeletes;
    //
    protected $fillable = ['nombre_evento', 'descripcion'];
    public function voluntarios()
    {
        return $this->belongsToMany(Voluntarios::class, 'evento_voluntario', 'evento_id', 'voluntario_id')->withPivot('contacto');
    }
    
    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'modelo');
    }
   /* public function setNombreEventoAttribute($value)
    {
        $this->attributes['nombre_evento'] = strtoupper($value);
    }
    */
}
