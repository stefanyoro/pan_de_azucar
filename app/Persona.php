<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Persona extends Model
{
    protected $table = 'persona';
    
    public function entrenador()
    {
     return $this->hasOne(Entrenador::class, 'persona_id');
    }
    public function administrador()
    {
     return $this->hasOne(Administrador::class, 'persona_id');
    }
    public function nutricionista()
    {
     return $this->hasOne(Nutricionista::class, 'persona_id');
    }
}
