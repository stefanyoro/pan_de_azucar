<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Persona;
use App\Corredor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
             $user->password = bcrypt($request->password);
             $user->rol = $request->rol;
             $user->img = $request->img;
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
            $persona->telf_local = $request->telf_local;
            $persona->telf_celular = $request->telf_celular;
            $persona->tipo_sangre = $request->tipo_sangre;           
         $persona->save();

         //dd($request);
         $corredor = new Corredor;
            $corredor->user_id = $user->id;
            $corredor->edad = $request->edad;
            $corredor->peso = $request->peso;
            $corredor->estatura = $request->estatura;
            $corredor->grupo_ciclismo = $request->grupo_ciclismo;
           
         $corredor->save();

         return view('registroExitoso');
    }

   public function verPerfil()
    {
        return view('verPerfil'); 
    }


    public function vistaModificarPerfil()
    {   
        return view('vistaModificarPerfil'); 
    }

    public function actualizarPerfil(){

      
        return view('verPerfil');
    }

}
