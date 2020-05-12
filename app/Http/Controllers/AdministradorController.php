<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Persona;
use App\Corredor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdministradorController extends Controller
{
    public function vistaRegistroUsuario()
    {
         return view('registroUsuario'); 
    }


    public function RegistrarCorredor(Request $request)
    {
         //dd($request);
         $user = new User;
             $user->name= $request->nombre;
             $user->email= $request->correo;
             $user->password = $request->password;
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
            $corredor->tipo = $request->tipo_corredor;
            $corredor->edad = $request->edad;
            $corredor->peso = $request->peso;
            $corredor->estatura = $request->estatura;
           
         $corredor->save();

         return view('registroExitoso');
    }

}
