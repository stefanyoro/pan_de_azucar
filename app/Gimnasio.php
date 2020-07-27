<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
   	  protected $table = 'gimnasio';

   	   public function ejercicios()
    {
    	return $this->belongsTo(Ejercicios::class, 'id_ejercicio');
    }
}