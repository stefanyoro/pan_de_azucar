<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';

    public function inscribir()
    {
        return $this->hasMany(Inscribir::class, 'carrera_id');
    }
}