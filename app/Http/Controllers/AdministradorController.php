<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Role;
use App\User;
use App\Persona;
use App\Administrador;
use App\Entrenador;
use App\Nutricionista;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
             $user->password = bcrypt($request->password);
             $user->password2 = bcrypt($request->password2);
             $user->rol = $request->rol;
             $user->img = $request->img;
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
            $persona->estado = $request->estado;
            $persona->ciudad = $request->ciudad;
            $persona->telf_local = $request->telf_local;
            $persona->telf_celular = $request->telf_celular;
            $persona->tipo_sangre = $request->tipo_sangre; 
           
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
        
        return redirect()->back()->with('data',['mensaje'=> '¡El usuario fue registrado con éxito!']);
    }

     public function listadoUsuarios()
    {
        
        $usuarios = User::all();

        return view('listadoUsuarios')->with('usuarios',$usuarios); 
    }


    public function enviarContraseña (Request $request){

        if (User::where('email',$request->email)->get()->count() == 0) {
            
            return redirect()->back()->with('data',['mensaje'=> 'El correo no está registrado.']);
        }else{  
            $datos = uniqid();

                $user = User::where('email',$request->email)->get()->first();
                $user->password = bcrypt($datos);


                $data=array('password'=> $datos);
            
            Mail::send('contraseña',$data,function($mensaje) use ($request){
                $mensaje->from('app.noreply.system@gmail.com','Recuperar Contraseña');
                $mensaje->to($request->email)->subject('Recuperar Contraseña');
            });

        $user->save();
        return redirect()->back()->with('data',['mensaje'=> '¡Su contraseña fue enviada con éxito!']);
        }
    }

    public function eliminarUsuario(Request $request)
    { 
        $usuario = User::find($request->id);
            $usuario->estatus = 0;
        $usuario->save();

        return redirect()->back()->with('data',['mensaje'=> '¡El usuario fue eliminado con éxito!']);

    }

    public function recuperarContraseña()
    {
       
        return view('cambiarContraseña'); 
    }
    public function cambiarContraseña(Request $request)
    {
        $user = User::find($request->id);
             $user->name= $request->nombre;
             $user->email= $request->correo;
             $user->password = bcrypt($request->password);
             $user->password2 = bcrypt($request->password2);
         $user->save();

        return redirect()->back()->with('data',['mensaje'=> '¡Su contraseña fue cambiada con éxito!']);
    }
}
