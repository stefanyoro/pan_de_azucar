<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

//clase MODELO
use App\User;
use App\Persona;
use App\Corredor;
use App\Mtb;
use App\Ruta;
use App\Gimnasio;
use App\PlanEntrenamiento;
use App\Ejercicios;
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
     return redirect()->back()->with('data',['mensaje'=> '¡Su perfil fue modificado con éxito!']);

    }

    public function nuevoEjercicio()
    {
        
        return view('nuevoEjercicio'); 
    }

    public function RegistrarEjercicio(Request $request)
    {  //dd($request->file('foto'));
        $foto = $request->file("foto");
        $extension = $foto->getClientOriginalExtension();
        Storage::disk('public')->put($foto->getFilename().".".$extension, File::get($foto));
        
        $ejercicios = new Ejercicios;
            $ejercicios->zona = $request->zona;
            $ejercicios->nombre = $request->nombre;
            $ejercicios->posicion = $request->posicion;
            $ejercicios->ejecucion = $request->ejecucion;
            $ejercicios->respiracion = $request->respiracion;
            $ejercicios->musculos = $request->musculos;
            $ejercicios->img = $foto->getFilename().".".$extension; 
        $ejercicios->save();

    return redirect()->back()->with('data',['mensaje'=> '¡Nuevo ejercicio agregado!']);
        
    }

    public function listaEjercicio()
    {
        
        $ejercicios = Ejercicios::all();

        return view('listaEjercicios')->with(['ejercicios'=> $ejercicios]); 
    }

     public function modificarEjercicio(Request $request)
    {
        $ejercicios = Ejercicios::find($request->id);
        //$carrera->adm_id = $request->id; extraer este valor como se hace ??
        $ejercicios->zona = $request->zona;
        $ejercicios->nombre = $request->nombre;
        $ejercicios->posicion = $request->posicion;
        $ejercicios->ejecucion = $request->ejecucion;
        $ejercicios->respiracion = $request->respiracion;
        $ejercicios->musculos = $request->musculos;
        //$carrera->foto= $foto->getFilename().".".$extension;  
        //dd($carrera);
        $ejercicios->save();

        return redirect()->back();
    }
    public function eliminarEjercicio(Request $request)
    { 
        $ejercicios = Ejercicios::find($request->id);
            $ejercicios->estatus = 0;
        $ejercicios->save();

        return redirect()->back();

    }

}