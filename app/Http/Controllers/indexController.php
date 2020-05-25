<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Inscribir;

class indexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexConsulta()
    {
        $inscribir= Inscribir::all();
       $carreras = Carrera::all();
        return view('index')->with(['carreras'=> $carreras, 'inscribir'=> $inscribir]);
    }
}
