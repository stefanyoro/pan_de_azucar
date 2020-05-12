<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//clase MODELO
use App\Corredor;



class ResultadosController extends Controller
{
	public function vistaResultados()
    {
         return view('resultadosCarreras'); 
    }

    public function verResultados()
    {
         return view('verResultados'); 
    }
    
    public function RegistrarResultados(Request $request)
    {
  



    }
}