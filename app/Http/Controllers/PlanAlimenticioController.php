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

    public function eliminarPlanA(Request $request)
    { 
        $planA = PlanAlimenticio::find($request->id);
            $planA->status = 0;
        $planA->save();

        return redirect()->back()->with('data',['mensaje'=> '¡Plan de alimentación eliminado con éxito!']);

    }

    public function nuevoAlimento()
    {
        
        return view('nuevoAlimento'); 
    }

    public function RegistrarAlimento(Request $request)
    {   
        if($request->alimento == 1){
            $alimento = new Leche;
                $alimento->nombre = $request->nombre;
            $alimento->save();
        }else
            if($request->alimento == 2){
                $alimento = new Carnes;
                    $alimento->nombre = $request->nombre;
                $alimento->save();
            }else
                if($request->alimento == 3){
                    $alimento = new Legumbres;
                        $alimento->nombre = $request->nombre;
                    $alimento->save();
                }else
                    if($request->alimento == 4){
                        $alimento = new Hortalizas;
                            $alimento->nombre = $request->nombre;
                        $alimento->save();
                    }else
                        if($request->alimento == 5){
                            $alimento = new Frutas;
                                $alimento->nombre = $request->nombre;
                            $alimento->save();
                        }else
                            if($request->alimento == 6){
                                $alimento = new Cereales;
                                    $alimento->nombre = $request->nombre;
                                $alimento->save();
                            }else
                                if($request->alimento == 7){
                                    $alimento = new Aceites;
                                        $alimento->nombre = $request->nombre;
                                    $alimento->save();
                                }

                            return redirect()->back()->with('data',['mensaje'=> '¡Nuevo alimento agregado!']);
        
    }

    public function listaAlimentos()
    {
        
        $leches = Leche::all();
        $carnes = Carnes::all();
        $legumbres = Legumbres::all();
        $hortalizas = Hortalizas::all();
        $cereales = Cereales::all();
        $aceites = Aceites::all();
        $frutas = Frutas::all();

        return view('listaAlimentos')->with(['leches'=>$leches, 'carnes'=>$carnes, 'legumbres'=>$legumbres, 'hortalizas'=>$hortalizas, 'cereales'=>$cereales, 'aceites'=>$aceites, 'frutas'=>$frutas]); 
    }

    public function modificarAlimento(Request $request)
    {
        if($request->alimento == 1){
            $alimento = Leche::find($request->id);
                $alimento->nombre = $request->nombre;
            $alimento->save();
        }else
            if($request->alimento == 2){
                $alimento = Carnes::find($request->id);
                    $alimento->nombre = $request->nombre;
                $alimento->save();
            }else
                if($request->alimento == 3){
                    $alimento = Legumbres::find($request->id);
                        $alimento->nombre = $request->nombre;
                    $alimento->save();
                }else
                    if($request->alimento == 4){
                        $alimento = Hortalizas::find($request->id);
                            $alimento->nombre = $request->nombre;
                        $alimento->save();
                    }else
                        if($request->alimento == 5){
                            $alimento = Frutas::find($request->id);
                                $alimento->nombre = $request->nombre;
                            $alimento->save();
                        }else
                            if($request->alimento == 6){
                                $alimento = Cereales::find($request->id);
                                    $alimento->nombre = $request->nombre;
                                $alimento->save();
                            }else
                                if($request->alimento == 7){
                                    $alimento = Aceites::find($request->id);
                                        $alimento->nombre = $request->nombre;
                                    $alimento->save();
                                }

        return redirect()->back()->with('data',['mensaje'=> '¡Alimento modificado satisfactoriamente!']);
    }

    public function eliminarAlimento(Request $request)
    {   
        if($request->alimento == 1){
            $alimento = Leche::find($request->id);
                $alimento->status = 0;
            $alimento->save();
        }else
            if($request->alimento == 2){
                $alimento = Carnes::find($request->id);
                    $alimento->status = 0;
                $alimento->save();
            }else
                if($request->alimento == 3){
                    $alimento = Legumbres::find($request->id);
                        $alimento->status = 0;
                    $alimento->save();
                }else
                    if($request->alimento == 4){
                        $alimento = Hortalizas::find($request->id);
                            $alimento->status = 0;
                        $alimento->save();
                    }else
                        if($request->alimento == 5){
                            $alimento = Frutas::find($request->id);
                                $alimento->status = 0;
                            $alimento->save();
                        }else
                            if($request->alimento == 6){
                                $alimento = Cereales::find($request->id);
                                    $alimento->status = 0;
                                $alimento->save();
                            }else
                                if($request->alimento == 7){
                                    $alimento = Aceites::find($request->id);
                                        $alimento->status = 0;
                                    $alimento->save();
                                }

        return redirect()->back();

    }

    public function miNutricion()
    {
        $usuarios = User::all();
        $planes = PlanAlimenticio::all();
        
        return view('miNutricion')->with(['usuarios'=> $usuarios, 'planes'=> $planes]); 
    }

    public function nutricionPDF($id){

        $usuarios = User::all();
        $planes = PlanAlimenticio::where('id',$id)->get();
        $leches = Leche::all();
        $carnes = Carnes::all();
        $legumbres = Legumbres::all();
        $hortalizas = Hortalizas::all();
        $cereales = Cereales::all();
        $aceites = Aceites::all();
        $frutas = Frutas::all();

        $pdf = \PDF::loadView('NutricionPDF',['usuarios' => $usuarios, 'planes' =>$planes, 'leches' =>$leches, 'carnes'=>$carnes, 'legumbres'=>$legumbres, 'hortalizas'=>$hortalizas, 'cereales'=>$cereales, 'aceites'=>$aceites, 'frutas'=>$frutas]);

        return $pdf->setPaper('a4')->stream('NutricionPDF.pdf');
    }
}