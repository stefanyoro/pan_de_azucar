<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class PdfController extends Controller
{

    public function carnet(){

        $persona = Auth::User()->persona;
        $pdf = \PDF::loadView('CarnetPDF',['persona' => $persona]);
   
     return $pdf->setPaper('a6')->stream('CarnetPDF.pdf');
}


    public function planBasico(){

               $pdf = \PDF::loadView('planBasicoPDF');
   
     return $pdf->setPaper('a4')->stream('planBasicoPDF.pdf');
}


}