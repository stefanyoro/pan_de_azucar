<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//clase MODELO
use App\Corredor;



class PersonaController extends Controller
{

    public function Persona(Request $request)
    {
         //dd($request);
         $persona = new Persona;
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
         return view('registroExitoso');
    }
}