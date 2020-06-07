<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PlanEntrenamiento extends Model
{
    protected $table = 'plan_entrenamiento';

   	public function mtb()
    {
    	return $this->hasOne(Mtb::class, 'id');
    }

    public function ruta()
    {
    	return $this->hasOne(Ruta::class, 'id');
    }

    public function gimnasio()
    {
    	return $this->hasOne(Gimnasio::class, 'id');
    }
}