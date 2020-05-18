<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Persona;
use App\Corredor;
use App\Administrador;
use App\Entrenador;
use App\Nutricionista;
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

    public function actualizarPerfil(Request $request){
        
       $user = User::find($request->id);
             $user->name= $request->nombre;
             $user->email= $request->correo;
             $user->img = $request->img;
         $user->save();
        
        $persona = Persona::find($request->id);
            $persona->user_id = $user->id;
            $persona->nacionalidad = $request->nacionalidad;
            $persona->tipo_doc = $request->tipo_doc;
            $persona->sexo = $request->sexo;
            $persona->numero_doc = $request->numero_doc;
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->fecha_nac = $request->fecha_nac;
            $persona->direccion = $request->direccion;
            $persona->telf_local = $request->telf_local;
            $persona->telf_celular = $request->telf_celular;
            $persona->tipo_sangre = $request->tipo_sangre;           
         $persona->save();


       // dd($request);
        if($request->rol == '4'){
            $corredor = Corredor::find($request->id);
            $corredor->user_id = $user->id;
            $corredor->edad = $request->edad;
            $corredor->peso = $request->peso;
            $corredor->estatura = $request->estatura;
            $corredor->grupo_ciclismo = $request->grupo_ciclismo;
           
         $corredor->save();
        }

        if($request->rol == '1'){
            $administrador = Administrador::find($request->id);
                $administrador->persona_id = $persona->id;
                $administrador->especialidad = $request->especialidad;
                $administrador->grado_Instrucc = $request->grado_Instrucc;

            $administrador->save();
        }
        if($request->rol == '2'){
            $entrenador = Entrenador::find($request->id);
                $entrenador->persona_id = $persona->id;
                $entrenador->especialidad = $request->especialidad;

            $entrenador->save();
        }
       if($request->rol == '3'){
            $nutricionista = Nutricionista::find($request->id);
                $nutricionista->persona_id = $persona->id;
                $nutricionista->grado_Instrucc = $request->grado_Instrucc;

            $nutricionista->save();
        }
        

        return redirect()->back()->with('data',['mensaje'=> '¡Su perfil fue modificado con éxito!']);
    }

}
