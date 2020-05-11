<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//clase MODELO
use App\Carrera;



class CarreraController extends Controller
{
	public function registroCarrera()
    {
         return view('aperturaCarreras'); 
    }
    public function consultaCarrera()
    {
         return view('consultaCarrera'); 
    }

}