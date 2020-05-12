<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//clase MODELO
use App\Corredor;



class UserController extends Controller
{

    public function User(Request $request)
    {
         //dd($request);
         $user = new User;
         	 $user->name= $request->nombre;
         	 $user->email= $request->correo;
         	 $user->password = $request->password;
             $user->img = $request->img;
         $user->save();

         return view('registroExitoso');
    }
}
