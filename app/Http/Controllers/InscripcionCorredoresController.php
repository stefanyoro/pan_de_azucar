<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//clase MODELO
use App\User;
use App\Carrera;
use App\Banco;
use App\Corredor;
use App\Inscribir;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
    
    public function verificarPago()
    {
        $inscribir = Inscribir::where('estatus', 1)->get();
        
         return view('verificarPago',['inscribir'=>$inscribir]);

    }

    public function comprobarPago(Request $id)
    {
        $inscribir = Inscribir::find($id)->first();
        $inscribir->estatus = 0;
        $inscribir->save();

        return redirect()->back()->with('data',['mensaje'=>'Pago aprobado']);  
    }

}