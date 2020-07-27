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
        $carreras = Carrera::find($id);
        return view('verResultados')->with(['carreras'=> $carreras]); 
    }
    public function informacionCarrera($id)
    {
        $carreras = Carrera::all($id);
       //$resultado = DB::select('select * from carrera where id = ' . $id);
        //dd($carreras)
        //$inscribir= Inscribir::all(); 
        //$inscribir = Inscribir::where('corredor_id', Auth::user()->corredor->id)->where('estatus_corredor', 0)->first();


        //$resultado = resultado::all();
        //dd($resultado);
        
        //return view('verResultados1')->with(['carreras'=> $carreras,'inscribir'=> $inscribir]);*/
        return view('verResultados')->with(['carreras'=> $carreras]); 
    }
    public function resultadosPDF(){

        $pdf = \PDF::loadView('resultadosPDF');
   
    return $pdf->setPaper('a4')->stream('resultadosPDF.pdf');
    }
}