<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//clase MODELO
use App\User;
use App\Persona;
use App\Corredor;
use App\Mtb;
use App\Ruta;
use App\Gimnasio;
use App\PlanEntrenamiento;
use Auth;


class PlanEntrenamientoController extends Controller
{
	public function vistaRegistroEntrenamiento()
    {
    	$usuarios = User::all();
        $personas = Persona::all();

        return view('planEntrenamiento')->with(['usuarios'=> $usuarios, 'personas'=> $personas]); 
    }

    public function RegistrarPlanE(Request $request)
    {
    	$mtb = new Mtb;
    		$mtb->dias = implode(',', $request->dias);
    		$mtb->tiempo = $request->tiempo;
    		$mtb->intensidad = $request->intensidad;
    		$mtb->cadencia = $request->cadencia;
    	$mtb->save();

    	$ruta = new Ruta;
    		$ruta->dias = implode(',', $request->dias);
    		$ruta->tiempo = $request->tiempo;
    		$ruta->intensidad = $request->intensidad;
    		$ruta->frecuencia = $request->frecuencia;
    	$ruta->save();

    	$gimnasio = new Gimnasio;
    		$gimnasio->zona = $request->zona;
    		$gimnasio->ejercicio = $request->ejercicio;
    		$gimnasio->series = $request->series;
    		$gimnasio->repeticiones = $request->repeticiones;
    		$gimnasio->peso = $request->peso;
    		$gimnasio->dias = implode(',', $request->dias);
    	$gimnasio->save();

    	$plan = new PlanEntrenamiento;
            $plan->entrenador_id = Auth::user()->id;
            $plan->corredor_id = $request->id_user;
            $plan->mtb_id = $mtb->id;
            $plan->ruta_id = $ruta->id;
            $plan->gimnasio_id = $gimnasio->id;
            $plan->nombre = $request->nombre;
            $plan->apellido = $request->apellido;
           
        $plan->save();

    }

}