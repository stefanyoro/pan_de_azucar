<?php

namespace App\Http\Controllers;
//clase MODELO
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carrera;
use App\Inscribir;
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

            foreach ($request->tiempo as $key => $value) {
                $resultado = new Resultado;
                $resultado->inscribir_id = $request->id;
                $resultado->tiempo = $value;
            $resultado->save();
            }
            
        return redirect()->back();
    }
    public function verResultados($id)
    {
        $carrera = Carrera::find($id);
        return view('verResultados')->with(['carrera'=> $carrera]); 
    }
    public function informacionCarrera()
    {
        $carreras = Carrera::all();
        return view('verResultados1')->with(['carreras'=> $carreras]); 
    }
    public function resultadosPDF(){

        $pdf = \PDF::loadView('resultadosPDF');
   
    return $pdf->setPaper('a4')->stream('resultadosPDF.pdf');
    }
}