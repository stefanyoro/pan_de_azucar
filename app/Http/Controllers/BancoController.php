<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BancoReceptor;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('banco');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $this->validate(request(), [
            'titular' => 'required|string',
            'banco_id' => 'required|string',
            'cedula' => 'required|string',
            'cuenta' => 'required|string',
            'nro_cuenta' => 'required|numeric',
            'telefono' => 'required|numeric',
            'correo' => 'email|required|string',
            ]);

        $banco = BancoReceptor::create($request->all());
        return redirect()->back()->with('data',['mensaje'=>'Registro de Banco Receptor Exitoso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banco = BancoReceptor::find($id)->delete();

        return back()->with('data',['mensaje'=>'Registro eliminado con exito']);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $banco = BancoReceptor::find($id);

        $banco->fill($request->all())->save();

        return redirect()->back()->with('data',['mensaje'=>'Registro modificado con exito']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
