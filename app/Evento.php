<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    public function voluntarios()
    {
        return $this->belongsToMany(Voluntarios::class);
    }
}
