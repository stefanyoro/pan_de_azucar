<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Persona;
use App\Corredor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CorredorController extends Controller
{
    public function vistaRegistroCorredor()
    {
         return view('afiliacionCorredor'); 
    }

    public function vistaRegistroExitoso()
    {
         return view('registroExitoso'); 
    }

    public function RegistrarCorredor(Request $request)
    {
         //dd($request);
         $user = new User;
             $user->name= $request->nombre;
             $user->email= $request->correo;
             $user->password = $request->password;
             $user->rol = $request->rol;
         $user->save();
        
         $persona = new Persona;
            $persona->user_id = $user->id;
            $persona->nacionalidad = $request->nacionalidad;
            $persona->tipo_doc = $request->tipo_doc;
            $persona->sexo = $request->sexo;
            $persona->numero_doc = $request->numero_doc;
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->fecha_nac = $request->fecha_nac;

            $persona->direccion = $request->direccion;
           
         $persona->save();

         //dd($request);
         $corredor = new Corredor;
            $corredor->user_id = $user->id;
            $corredor->edad = $request->edad;
            $corredor->peso = $request->peso;
            $corredor->estatura = $request->estatura;
           
         $corredor->save();

         return view('registroExitoso');
    }

   public function verPerfil()
    {
        $id = Auth::user()->id;
        $personas =\DB::select('select * from persona where user_id = ? ',[$id]);
        $corredores =\DB::select('select * from corredor where user_id = ?',[$id]); 

        return view('verPerfil')->with('personas',$personas)->with('corredores',$corredores); 
    }


    public function vistaModificarPerfil()
    {   
        $id = Auth::user()->id;
        $personas =\DB::select('select * from persona where user_id = ? ',[$id]);
        $corredores =\DB::select('select * from corredor where user_id = ?',[$id]); 
        
        return view('vistaModificarPerfil')->with('personas',$personas)->with('corredores',$corredores); 
    }

    public function actualizarPerfil(){

      
        return view('verPerfil');
    }

}
