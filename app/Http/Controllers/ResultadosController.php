<?php

namespace App\Http\Controllers;
//clase MODELO
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carrera;
use App\Resultado;


class ResultadosController extends Controller
{
	public function registroResultados()
    {
        //consulta carrera
        //$resultado = resultado::all();
        $carreras = Carrera::all();
        //dd($carreras);

        return view('resultadosCarreras')->with(['carreras'=> $carreras]);
    }
    
    public function RegistrarResultados(Request $request)
    {
            //dd($request);
            $resultado = new Resultado;
                $resultado->inscribir_id = $request->id;
                $resultado->tiempo = $request->tiempo;
                $resultado->vuelta = $request->vuelta;
                $resultado->posicion = $request->posicion;
            $resultado->save();
        return redirect()->back();
    }
    public function verResultados()
    {
         return view('verResultados'); 
    }
}