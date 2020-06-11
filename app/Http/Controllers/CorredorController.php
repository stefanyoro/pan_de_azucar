<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Persona;
use App\Corredor;
use App\Administrador;
use App\Entrenador;
use App\Nutricionista;
use App\Estados;
use App\Ciudades;
use App\Municipios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CorredorController extends Controller
{
    public function vistaRegistroCorredor()
    {
        $estados = Estados::all();
        $ciudades = Ciudades::all();
        $municipios = Municipios::all();

        return view('afiliacionCorredor')->with(['estados'=> $estados, 'ciudades'=> $ciudades, 'municipios'=> $municipios]); 
    }

    public function vistaRegistroExitoso()
    {
         return view('registroExitoso'); 
    }

    public function RegistrarCorredor(Request $request)
    {
        //dd($request->file('foto'));
        $foto = $request->file("foto");
        $extension = $foto->getClientOriginalExtension();
        Storage::disk('public')->put($foto->getFilename().".".$extension, File::get($foto));

         //dd($request);
         $user = new User;
             $user->name= $request->nombre;
             $user->email= $request->correo;
             $user->password = bcrypt($request->password);
             $user->password2 = bcrypt($request->password2);
             $user->rol = $request->rol;
             $user->img = $foto->getFilename().".".$extension;
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
            $persona->estado = $request->estado;
            $persona->ciudad = $request->ciudad;
            $persona->municipio = $request->municipio;
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
         

       $data=array('user'=> $user);
        
        Mail::send('Bienvenido',$data,function($mensaje) use ($user){
              $mensaje->from('app.noreply.system@gmail.com','Registro exitoso');
              $mensaje->to('stefanyoropeza94@gmail.com')->subject('Bienvenido');
            });
            
            
            

         return view('registroExitoso');
    }

   public function verPerfil()
    {
        return view('verPerfil'); 
    }


    public function vistaModificarPerfil()
    {   
        $estados = Estados::all();
        $ciudades = Ciudades::all();
        $municipios = Municipios::all();

        return view('vistaModificarPerfil')->with(['estados'=> $estados, 'ciudades'=> $ciudades, 'municipios'=> $municipios]); 
    }

    public function actualizarPerfil(Request $request){

        $foto = $request->file("foto");
        $extension = $foto->getClientOriginalExtension();
        Storage::disk('public')->put($foto->getFilename().".".$extension, File::get($foto));
        
       $user = User::find($request->id);
             $user->name= $request->nombre;
             $user->email= $request->correo;
             $user->img = $foto->getFilename().".".$extension;
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
            $persona->estado = $request->estado;
            $persona->ciudad = $request->ciudad;
            $persona->municipio = $request->municipio;
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
