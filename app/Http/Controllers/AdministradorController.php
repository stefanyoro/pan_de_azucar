<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Persona;
use App\Administrador;
use App\Entrenador;
use App\Nutricionista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdministradorController extends Controller
{
    public function vistaRegistroUsuario()
    {
         return view('registroUsuario'); 
    }


    public function RegistrarUsuario(Request $request)
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
            $persona->numero_doc = $request->numero_doc;
            $persona->sexo = $request->sexo;
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->fecha_nac = $request->fecha_nac;
            $persona->direccion = $request->direccion;
           
         $persona->save();
        
        if($request->rol == '1'){
            $administrador = new Administrador;
                $administrador->persona_id = $persona->id;
                $administrador->especialidad = $request->especialidad;
                $administrador->grado_Instrucc = $request->grado_Instrucc;

            $administrador->save();
        }
        if($request->rol == '2'){
            $entrenador = new Entrenador;
                $entrenador->persona_id = $persona->id;
                $entrenador->especialidad = $request->especialidad;

            $entrenador->save();
        }
       if($request->rol == '3'){
             $nutricionista = new Nutricionista;
                $nutricionista->persona_id = $persona->id;
                $nutricionista->grado_Instrucc = $request->grado_Instrucc;

            $nutricionista->save();
        }

        return view('registroUsuario');
    }

     public function listadoUsuarios()
    {
        
        $usuarios =\DB::select('select * from users'); 

        return view('listadoUsuarios')->with('usuarios',$usuarios); 
    }

}
