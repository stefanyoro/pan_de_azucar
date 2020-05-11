<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//clase MODELO
use App\PlanEntrenamiento;



class PlanEntrenamientoController extends Controller
{
	public function vistaRegistroEntrenamiento()
    {
         return view('planEntrenamiento'); 
    }

}