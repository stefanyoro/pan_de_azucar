<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;

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
       $carreras = Carrera::all();
        return view('index')->with('carreras',$carreras); 
    }
}
