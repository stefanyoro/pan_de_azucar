<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//clase MODELO
use App\User;
use App\Carrera;
use App\Banco;
use App\Corredor;
use App\Inscribir;
use Auth;
class InscripcionCorredorescontroller extends Controller
{



    // METODOO VERDE//
	public function inscripcioncorredores($id=null)
    {
     //consulta carrera
        if($id == null){
            $carreras = Carrera::all();
        
        }else{
            $carreras = Carrera::where('id', $id)->get();
        }
        
        $bancos = Banco::all();
        
         return view('inscripcionCorredores')->with(['carreras'=> $carreras,'bancos'=> $bancos]); 
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
        return redirect()->back()->with('data',['mensaje'=>'Esperando Confirmaciòn de pago']);
    }
    
    public function listadocorredores()
    {
          $carreras = Carrera::all();
          $bancos = Banco::all();

         return view('listadoCorredores')->with(['carreras'=> $carreras,'bancos'=> $bancos]);

    }
    public function supenderCorredor(Request $request)
    {
        $inscribir = Inscribir::find($request->id);
        $inscribir->estatus =0;
        $inscribir->save();
        return redirect()->back();
    }

    public function modificarPago(Request $request)
    {

     $inscribir = Inscribir::find($request->id);

        $inscribir->metodoPago = $request->metodoPago;
       $inscribir->banco = $request->banco;
        $inscribir->fecha = $request->fecha;
        $inscribir->descripcion = $request->descripcion;
        $inscribir->monto = $request->monto;
        $inscribir->referencia = $request->referencia;
        $inscribir->save();        
        return redirect()->back();   
    }

   
    public function recibo($id)
    {

        $persona = Auth::User()->persona;
        $carrera = Inscribir::find($id);
        $pdf = \PDF::loadView('reciboPDF',['persona' => $persona,'inscribir'=>$carrera]);

        return $pdf->setPaper('a6')->stream('reciboPDF');

    }
    


}