<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//clase MODELO
use App\User;
use App\Carrera;
use App\Banco;
use App\BancoReceptor;
use App\Corredor;
use App\Inscribir;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
class InscripcionCorredorescontroller extends Controller
{



    // METODOO VERDE//
	public function inscripcioncorredores($id)
    {
     //consulta carrera
        $inscribir= Inscribir::all();
        
        $carrera = Carrera::find($id);
        $bancos = Banco::all();
        $bancoR = BancoReceptor::all();
        
         return view('inscripcionCorredores')->with(['carrera'=> $carrera,'bancos'=> $bancos, 'inscribir'=> $inscribir,'bancoR'=>$bancoR]); 
    }
    
    public function guardarInscripcionCorredores(Request $request)
    {
        //modelo
        //dd($request->file('comprobante'));
        $comprobante = $request->file("comprobante");
        $extension = $comprobante->getClientOriginalExtension();
        Storage::disk('public')->put($comprobante->getFilename().".".$extension, File::get($comprobante));


        $inscribir = new Inscribir;
        $inscribir->corredor_id = Auth::user()->corredor->id;
        $inscribir->carrera_id = $request->carrera_id;
        $inscribir->metodoPago = $request->metodoPago;
        $inscribir->banco = $request->banco;
        $inscribir->fecha = $request->fecha;
        $inscribir->descripcion = $request->descripcion;
        $inscribir->monto = $request->monto;
        $inscribir->referencia = $request->referencia;
        $inscribir->comprobante = $comprobante->getFilename().".".$extension;


        $inscribir->save();
        return redirect()->back()->with('data',['mensaje'=>'Esperando confirmación de pago']);
    }
    
    public function listadocorredores()
    {
        if (Auth::user()->rol == 4) {
            if (Inscribir::where('corredor_id', Auth::user()->corredor->id)->where('estatus_corredor', 0)->first() != null){

            $inscribir = Inscribir::where('corredor_id', Auth::user()->corredor->id)->where('estatus_corredor', 0)->first();

            $inscribir->estatus_corredor = 1;
            $inscribir->save();
            } 
        }
          $carreras = Carrera::all();
          $bancos = Banco::all();


         return view('listadoCorredores')->with(['carreras'=> $carreras,'bancos'=> $bancos]);

    }
    public function supenderCorredor(Request $request)
    {
        $inscribir = Inscribir::find($request->id);
        $inscribir->delete();
        return redirect()->back();

    }

    public function modificarPago(Request $request)
    {

        if ($request->comprobante != null) {
            $comprobante = $request->file("comprobante");
            $extension = $comprobante->getClientOriginalExtension();
            Storage::disk('public')->put($comprobante->getFilename().".".$extension, File::get($comprobante));    
        }
        

     $inscribir = Inscribir::find($request->id);
        $inscribir->metodoPago = $request->metodoPago;
       $inscribir->banco = $request->banco;
        $inscribir->fecha = $request->fecha;
        $inscribir->descripcion = $request->descripcion;
        $inscribir->monto = $request->monto;
        $inscribir->referencia = $request->referencia;
        $inscribir->observacion = null;

        if ($request->comprobante != null)
        $inscribir->comprobante = $comprobante->getFilename().".".$extension;
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

    public function numero($id)
    {

        $persona = Auth::User()->persona;
        $carrera = Inscribir::find($id);
        $pdf = \PDF::loadView('numeroPDF',['persona' => $persona,'inscribir'=>$carrera]);

        return $pdf->setPaper('a6', 'landscape')->stream('numeroPDF');

    }
    
    public function verificarPago()
    {
        $inscribir = Inscribir::where('estatus', 1)->where('observacion', null)->get();
        
         return view('verificarPago',['inscribir'=>$inscribir]);

    }

    public function comprobarPago(Request $id)
    {
        $inscribir = Inscribir::find($id)->first();
        $inscribir->estatus = 0;
        $inscribir->estatus_corredor = 0;
        $inscribir->save();

        return redirect()->back()->with('data',['mensaje'=>'Pago aprobado']);  
    }

        public function carreraDisponible()
    {
        $carreras = Carrera::all();
        return view('carreraDisponible',['carreras'=> $carreras]);
    }
        public function observacion(Request $request)
    {
         $inscribir = Inscribir::find($request->id);
         
            $inscribir->observacion = $request->observacion;
           // $inscribir->estatus = 0;
            $inscribir->save();

        return redirect()->back()->with('data',['mensaje'=>'Observación enviada']); 
    }
}