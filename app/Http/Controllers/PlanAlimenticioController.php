<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

//clase MODELO
use App\User;
use App\Persona;
use App\Leche;
use App\Carnes;
use App\Legumbres;
use App\Hortalizas;
use App\Cereales;
use App\Aceites;
use App\Frutas;
use App\PlanAlimenticio;

use Auth;


class PlanAlimenticioController extends Controller
{
	public function Plan_Alimentacion()
    {
    	$usuarios = User::all();
        $personas = Persona::all();
        $leches = Leche::all();
        $carnes = Carnes::all();
        $legumbres = Legumbres::all();
        $hortalizas = Hortalizas::all();
        $cereales = Cereales::all();
        $aceites = Aceites::all();
        $frutas = Frutas::all();

        return view('planAlimenticio')->with(['usuarios'=> $usuarios, 'personas'=> $personas, 'leches'=>$leches, 'carnes'=>$carnes, 'legumbres'=>$legumbres, 'hortalizas'=>$hortalizas, 'cereales'=>$cereales, 'aceites'=>$aceites, 'frutas'=>$frutas]); 
    } 

    public function RegistrarPlanAlimenticio(Request $request)
    {

        $plan = new PlanAlimenticio;

            $plan->corredor_id = $request->id_user;
            $plan->nombre_plan = $request->nombre;
            $plan->fecha = $request->fecha;
            $plan->descripcion = $request->descripcion;
            $plan->id_leche = $request->id_leche;
            $plan->porcion_leche = $request->porcion_leche;
            $plan->equivalente_leche = $request->equivalente_leche;
            $plan->dias_leche = implode(',', $request->dias_leche); 

            $plan->id_carnes = $request->id_carne;
            $plan->porcion_carne = $request->porcion_carne;
            $plan->equivalente_carne = $request->equivalente_carne;
            $plan->dias_carne = implode(',', $request->dias_carne);

            $plan->id_legumbres = $request->id_legumbres;
            $plan->porcion_legumbre = $request->porcion_legumbre;
            $plan->equivalente_legumbre = $request->equivalente_legumbre;
            $plan->dias_legumbre = implode(',', $request->dias_legumbre);

            $plan->id_hortalizas = $request->id_hortalizas;
            $plan->porcion_hortaliza = $request->porcion_hortalizas;
            $plan->equivalente_hortaliza = $request->equivalente_hortalizas;
            $plan->dias_hortaliza = implode(',', $request->dias_hortalizas);

            $plan->id_frutas = $request->id_fruta;
            $plan->porcion_fruta = $request->porcion_fruta;
            $plan->equivalente_fruta = $request->equivalente_fruta;
            $plan->dias_fruta = implode(',', $request->dias_fruta);

            $plan->id_cereales = $request->id_cereal;
            $plan->porcion_cereal = $request->porcion_cereal;
            $plan->equivalente_cereal = $request->equivalente_cereal;
            $plan->dias_cereal = implode(',', $request->dias_cereal);

            $plan->id_aceites = $request->id_aceite;
            $plan->porcion_aceite = $request->porcion_aceite;
            $plan->equivalente_aceite = $request->equivalente_aceite;
            $plan->dias_aceite = implode(',', $request->dias_aceite);
        
        $plan->save();

        
     return redirect()->back()->with('data',['mensaje'=> '¡Su plan de alimentación fue creado con éxito!']);

    }

    public function ListadoPlanes()
    {
        $usuarios = User::all();
        $planes = PlanAlimenticio::all();
        $leches = Leche::all();
        $carnes = Carnes::all();
        $legumbres = Legumbres::all();
        $hortalizas = Hortalizas::all();
        $cereales = Cereales::all();
        $aceites = Aceites::all();
        $frutas = Frutas::all();

        return view('listadoPlanesAlimenticios')->with(['usuarios'=> $usuarios, 'planes'=> $planes, 'leches'=>$leches, 'carnes'=>$carnes, 'legumbres'=>$legumbres, 'hortalizas'=>$hortalizas, 'cereales'=>$cereales, 'aceites'=>$aceites, 'frutas'=>$frutas]); 
    }

}