<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Resultado extends Model
{
    protected $table = 'resultado';

   /* public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }*/
    public function corredor()
    {
    	return $this->belongsTo(Corredor::class, 'corredor_id');
    }

   	public function carrera()
    {
    	return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function Inscribir()
    {
    	return $this->belongsTo(Incribir::class, 'inscribir_id');
    }
}
