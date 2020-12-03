<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PlanAlimenticio extends Model
{
    protected $table = 'plan_alimenticio';

   	public function leche()
    {
    	return $this->hasOne(Leche::class, 'id');
    }

    public function carnes()
    {
    	return $this->hasOne(Carnes::class, 'id');
    }

    public function legumbres()
    {
    	return $this->hasOne(Legumbres::class, 'id');
    }

    public function hortalizas()
    {
        return $this->hasOne(Hortalizas::class, 'id');
    }

    public function frutas()
    {
        return $this->hasOne(Frutas::class, 'id');
    }

    public function cereales()
    {
        return $this->hasOne(Cereales::class, 'id');
    }

    public function aceites()
    {
        return $this->hasOne(Aceites::class, 'id');
    }
}