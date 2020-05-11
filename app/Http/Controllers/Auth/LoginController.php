<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['only' => 'ShowLoginForm']);
    }
    public function ShowLoginForm(){
        return view('auth.login');
    }
    public function login(){
        $datos = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        
        if (Auth::attempt($datos)) {
            if (Auth::user()->status == 1) {
                return redirect('configuracion');
            }else
                return redirect('/');
        }
    return view('auth.login')->witherrors('Error en autentificacion');
   }
   public function logout(){
        Auth::logout();
        return redirect('/');
   }
}