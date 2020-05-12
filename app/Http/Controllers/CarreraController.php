<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//clase MODELO
use App\Carrera;



class CarreraController extends Controller
{
	public function registroCarrera()
    {
         return view('aperturaCarreras'); 
    }
    
     public function RegistrarCarrera(Request $request)
    {
         //s dd($request);
        $foto = $request->file("foto");
        dd($foto);
        $extension = $foto->getClientOriginalExtension();
        Storage::disk('public')->put($foto->getFilename().".".$extension, File::get($foto));

        $carrera = new Carrera;
       	//$carrera->adm_id = $request->id; extraer este valor como se hace ??
        $carrera->nom_carrera = $request->nom_carrera;
        $carrera->lugar_salida = $request->lugar_salida;
        $carrera->lugar_llegada= $request->lugar_llegada;
        $carrera->fecha_carr = $request->fecha_carr;
        $carrera->hora = $request->hora;
        $carrera->modalidad= $request->modalidad;
        $carrera->categoria= $request->categoria;
        $carrera->monto= $request->monto;
        $carrera->kit_carrera= $request->kit_carrera;
        $carrera->foto= $foto->getFilename().".".$extension;  
         $carrera->save();

         //var_dump($carrera->id);

         //return view('consultaCarrera');
         //return view('listarCarrera');
        return redirect()->route('consultaCarrera',['id' => $carrera->id]);
    }

        public function consultaCarrera($id)
        {
            //if (isset($id) && !empty($id)) {
            //} else {
            //}
            $carreras =\DB::select('select * from carrera where id = ' . $id);
            //$carreras =\DB::select('select * from carrera1');
            return view('consultaCarrera')->with('carreras',$carreras); 

        }
    public function listarCarrera()
    {
    	//return view('listarCarrera');  
    	$carreras =\DB::select('select * from carrera');
        return view('listarCarrera')->with('carreras',$carreras); 

    }
}








