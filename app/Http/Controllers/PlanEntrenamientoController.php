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
        $ejercicios = Ejercicios::all();

        return view('planEntrenamiento')->with(['usuarios'=> $usuarios, 'personas'=> $personas, 'ejercicios'=> $ejercicios]); 
    }

    public function RegistrarPlanE(Request $request)
    {

    	$mtb = new Mtb;
    		$mtb->dias = implode(',', $request->dias_mtb);
    		$mtb->tiempo = $request->tiempo;
    		$mtb->intensidad = $request->tipo_intensidad;
    		$mtb->cadencia = $request->cadencia;
    	$mtb->save();

    	$ruta = new Ruta;
    		$ruta->dias = implode(',', $request->dias_ruta);
    		$ruta->tiempo = $request->tiempo;
    		$ruta->intensidad = $request->tipo_intensidad;
    		$ruta->frecuencia = $request->frecuencia;
    	$ruta->save();

    	$gimnasio = new Gimnasio;
    		$gimnasio->zona = $request->zona;
    		$gimnasio->id_ejercicio = $request->ejercicio;
    		$gimnasio->series = $request->serie;
    		$gimnasio->repeticiones = $request->repeticiones;
    		$gimnasio->peso = $request->peso;
    		$gimnasio->dias = implode(',', $request->dias);
    	$gimnasio->save();

    	$plan = new PlanEntrenamiento;
            $plan->corredor_id = $request->id_user;
            $plan->nombre = $request->nombre;
            $plan->fecha = $request->fecha;
            $plan->mtb_id = $mtb->id;
            $plan->ruta_id = $ruta->id;
            $plan->gimnasio_id = $gimnasio->id;
        $plan->save();
     return redirect()->back()->with('data',['mensaje'=> '¡Su plan de entrenamiento fue creado con éxito!']);

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

     public function miEntrenamiento()
    {
        $mtb = Mtb::all();
        $ruta = Ruta::all();
        $gimnasio = Gimnasio::all();
        $usuarios = User::all();
        $planes = PlanEntrenamiento::all();
        $ejercicios = Ejercicios::all();
        
        return view('miEntrenamiento')->with(['mtb'=> $mtb, 'ruta'=> $ruta, 'gimnasio'=> $gimnasio, 'usuarios'=> $usuarios, 'planes'=> $planes, 'ejercicios'=> $ejercicios]); 
    }
     public function listadoPlanesEntrenamiento()
    {
        $mtb = Mtb::all();
        $ruta = Ruta::all();
        $gimnasio = Gimnasio::all();
        $usuarios = User::all();
        $planes = PlanEntrenamiento::all();
        $ejercicios = Ejercicios::all();
        
        return view('listadoPlanesEntrenamiento')->with(['mtb'=> $mtb, 'ruta'=> $ruta, 'gimnasio'=> $gimnasio, 'usuarios'=> $usuarios, 'planes'=> $planes, 'ejercicios'=> $ejercicios]); 
    }

    public function entrenamientoPDF(){

        $mtb = Mtb::all();
        $ruta = Ruta::all();
        $gimnasio = Gimnasio::all();
        $usuarios = User::all();
        $planes = PlanEntrenamiento::all();
        $ejercicios = Ejercicios::all();

        $pdf = \PDF::loadView('EntrenamientoPDF',['mtb'=> $mtb, 'ruta'=> $ruta, 'gimnasio'=> $gimnasio, 'usuarios'=> $usuarios, 'planes'=> $planes, 'ejercicios'=> $ejercicios]);

        return $pdf->setPaper('a4')->stream('EntrenamientoPDF.pdf');
    }

}