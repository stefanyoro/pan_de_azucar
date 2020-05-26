<?php

namespace App\Http\Controllers;
//clase MODELO
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Carrera;
use App\Corredor;
//use App\Inscribir;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;


class ResultadosController extends Controller
{
	public function registroResultados($id)
    {
        //consulta carrera
        $resultado = resultado::all();
        $carrera = Carrera::find($id);
        //dd($resultado);

        return view('resultadosCarreras')->with(['carreras'=> $carreras, 'resultado'=> $resultado]);
    }
    
    public function RegistrarResultados(Request $request)
    {
            //dd($request);
            /*$resultado = new Resultado;
                $resultado->corredor_id = Auth::user()->corredor->id;
                $resultado->carrera_id = Auth::user()->carrera_id;
                $resultado->tiempo = $request->tiempo;
                $resultado->posicion = $request->posicion;
            $resultado->save();*/
        return view('resultadosCarreras');
        
    }
    public function verResultados()
    {
         return view('verResultados'); 
    }
}