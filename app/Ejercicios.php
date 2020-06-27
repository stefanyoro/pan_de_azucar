<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ejercicios extends Model
{
    protected $table = 'ejercicios';

    public function gimnasio()
    {
    	return $this->hasOne(gimnasio::class, 'id_ejercicio');
    }
}