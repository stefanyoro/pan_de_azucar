<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ContraseñaController extends Controller
{
   
    use ResetsPasswords;

        

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function recuperarContraseña()
    {
       
        return view('recuperarContraseña'); 
    }
    
    public function enviarContraseña (Request $request){

        $datos = uniqid();

            $user = User::where('email',$request->email)->get()->first();
            $user->password = bcrypt($datos);
            $user->status = 1;

            $data=array('password'=> $datos);
        
        Mail::send('correos.correoContraseña',$data,function($mensaje) use ($request){
            $mensaje->from('nueva3922@gmail.com','Recuperar Contraseña bodyfitness');
            $mensaje->to($request->email)->subject('Recuperar Contraseña');
        });

        $user->save();
        return response()->json('Contraseña nueva enviada al correo: '.$request->email);
    }
}
