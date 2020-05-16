<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//clase MODELO

use App\Carrera;
use App\Corredor;
use App\Inscribir;
use Auth;
class InscripcionCorredorescontroller extends Controller
{



    // METODOO VERDE//
	public function inscripcioncorredores()
    {
     //consulta carrera
        $carreras = Carrera::all();

         return view('inscripcionCorredores')->with('carreras', $carreras); 
    }
    
    public function guardarInscripcionCorredores(Request $request)
    {
        //modelo
        $inscribir = new Inscribir;
        $inscribir->corredor_id = Auth::user()->corredor->id;
        $inscribir->carrera_id = $request->carrera_id;
        $inscribir->metodoPago = $request->metodoPago;
        $inscribir->banco = $request->banco;
        $inscribir->fecha = $request->fecha;
        $inscribir->descripcion = $request->descripcion;
        $inscribir->monto = $request->monto;
        $inscribir->referencia = $request->referencia;
        $inscribir->save();
        dd("sii ");
    }
   
}