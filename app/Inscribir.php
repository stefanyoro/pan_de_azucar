<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscribir extends Model
{
	  protected $table = 'inscribir';
    //
	   public function corredor()
    {
        return $this->belongsTo(Corredor::class, 'corredor_id');
    }

    public function carrera()
    {
     return $this->belongsTo(Carrera::class, 'carrera_id');
    }

     public function banco()
    {
        return $this->hasOne(Banco::class, 'banco');
    }

}
