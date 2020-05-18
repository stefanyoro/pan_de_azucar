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
        $extension = $foto->getClientOriginalExtension();
        Storage::disk('public')->put($foto->getFilename().".".$extension, File::get($foto));

        $carrera = new Carrera;
        $carrera->nom_carrera = $request->nom_carrera;
        $carrera->lugar_salida = $request->lugar_salida;
        $carrera->lugar_llegada= $request->lugar_llegada;
        $carrera->fecha_carr = $request->fecha_carr;
        $carrera->hora = $request->hora;
        $carrera->meridiano= $request->meridiano;
        $carrera->modalidad= $request->modalidad;
        $carrera->categoria= implode(',', $request->categoria);
        $carrera->monto= $request->monto;
        $carrera->camisa= $request->camisa;
        $carrera->comida= $request->comida;
        $carrera->bebida= $request->bebida;
        $carrera->cupos= $request->cupos;
        $carrera->foto= $foto->getFilename().".".$extension;  
        $carrera->save();

         //var_dump($carrera->hora);
         //return view('consultaCarrera');
         //return view('listarCarrera');
        return redirect()->route('consultaCarrera',['id' => $carrera->id]);
    }

        public function consultaCarrera($id)
        {
            $carreras = DB::select('select * from carrera where id = ' . $id);
            return view('consultaCarrera')->with('carreras',$carreras); 
        }
    public function listarCarrera()
    {
    	//return view('listarCarrera');  
    	$carreras =\DB::select('select * from carrera');
        foreach ($carreras as $key => $carrera) {
            $carreras[$key]->array_categorias = explode(',', $carrera->categoria);
        }
        return view('listarCarrera')->with('carreras',$carreras); 
    }

    public function modificarCarrera(Request $request)
    {
        $carrera = Carrera::find($request->id);
        //$carrera->adm_id = $request->id; extraer este valor como se hace ??
         $carrera->nom_carrera = $request->nom_carrera;
        $carrera->lugar_salida = $request->lugar_salida;
        $carrera->lugar_llegada= $request->lugar_llegada;
        $carrera->fecha_carr = $request->fecha_carr;
        $carrera->hora = $request->hora;
        $carrera->meridiano= $request->meridiano;
        $carrera->modalidad= $request->modalidad;
        $carrera->categoria= implode(',', $request->categoria);
        $carrera->monto= $request->monto;
        $carrera->camisa= $request->camisa;
        $carrera->comida= $request->comida;
        $carrera->bebida= $request->bebida;
        $carrera->cupos= $request->cupos;
        //$carrera->foto= $foto->getFilename().".".$extension;  
        //dd($carrera);
        $carrera->save();

        return redirect()->back();
    }


    public function eliminarCarrera(Request $request)
    { 
        $carrera = Carrera::find($request->id);
            $carrera->estatus = 0;
        $carrera->save();

        return redirect()->back();

    }
}








