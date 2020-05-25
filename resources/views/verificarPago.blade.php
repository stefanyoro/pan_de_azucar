@extends('layouts.app')
 
@section('content')


<section class="section body"  align="center">
<div class="col-md-9">
        @if(session()->has('data'))
    <div class="alert alert-success" role="alert">
        {{session('data')['mensaje']}}
    </div>  
@endif
</div>
  <div class="container" align="center">
    <div class="col-md-12">
      <div class="card" style="border-color:#B03A2E; background: transparent;">
        <div class="card-header" style="background-color: #B03A2E; height: 40px;">
            <p  style="color:white; text-align:left;"> Listado de las Carreras</p> 
        </div>
        <div class="card-body" style="background-color: #0000;">
              <!--<form action="listarCarrera" method="post">@csrf-->
            <div class="row">
              <div class="col-md-12 table-responsive"> 
              <table id="listarcarrera" class="table">
                  <thead>  
                    <tr>
                      <th >N◦</th>
                      <th >Nombre</th>
                      <th >Apellido</th>
                      <th >Cedula</th>
                      <th >Opciones</th>                    
                  </thead>
                      <tbody>
                        @foreach($inscribir as $inscribirpersona)
                        <tr>
                          <td></td>
                          <td>{{$inscribirpersona->corredor->user->persona->nombre}}</td>
                          <td>{{$inscribirpersona->corredor->user->persona->apellido}}</td>
                          <td>V-{{$inscribirpersona->corredor->user->persona->numero_doc}}</td>
                          <td>
                            <button class="btn btn-info" data-toggle="modal"  data-toggle="modal" data-target="#informacion_{{$inscribirpersona->id}}" title="Informacion"><b><i class="fa fa-info" aria-hidden="true"></i></button>


                            <button class="btn btn-warning" data-toggle="modal"  data-toggle="modal" data-target="  #comprobante_{{$inscribirpersona->id}}"title="comprobante"><b><i class="fa fa-eye" aria-hidden="true"></i></button>

                            <button class="btn btn-success" data-toggle="modal"  data-toggle="modal" data-target="#aceptar_{{$inscribirpersona->id}}"title="Aceptar"><b><i class="fa fa-check-circle" aria-hidden="true"></i></button>

                            <button class="btn btn-danger" data-toggle="modal"  data-toggle="modal" data-target="#rechazar_{{$inscribirpersona->id}}"title="Rechazar"><b><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                          </td>
                        </tr>
<!-- Modal informacion -->
<div class="modal fade" id="informacion_{{$inscribirpersona->id}}" tabindex="-1" role="dialog" aria-labelledby="informacion_{{$inscribirpersona->id}}Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Informacion de pago de: {{$inscribirpersona->corredor->user->persona->nombre}} {{$inscribirpersona->corredor->user->persona->apellido}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">

                   <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-usd" aria-hidden="true"></i>Banco:</p>  
                              <input disabled type="text" class="form-control" name="monto" value="{{App\Banco::where('codigo', $inscribirpersona->banco)->first()->nombre}}">
                          
                            </div>

                   <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-usd" aria-hidden="true"></i>Metodo de pago:</p>  
                              <input disabled type="text" class="form-control" name="monto" value="{{$inscribirpersona->metodoPago}}">
                          
                            </div>
                            
                  <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-usd" aria-hidden="true"></i>Monto:</p>  
                              <input disabled type="number" class="form-control" name="monto" value="{{$inscribirpersona->monto}}">
                          
                            </div>
                              <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>     
                            Nº de referencia:</p>
                              <input disabled type="number" class="form-control" name="referencia" value="{{$inscribirpersona->referencia}}">
                            </div>
                            <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha:</p>
                              <input disabled type="date" class="form-control" name="fecha"  required="required" value="{{$inscribirpersona->fecha}}">
                            </div> 
                             <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              Descripciòn:</p>
                              <input disabled type="text" class="form-control" name="descripcion"  required="required" value="{{$inscribirpersona->descripcion}}">
                            </div> 


      
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal comprobante -->
<div class="modal fade" id="comprobante_{{$inscribirpersona->id}}" tabindex="-1" role="dialog" aria-labelledby="comprobante_{{$inscribirpersona->id}}Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Comprobante de pago de: {{$inscribirpersona->corredor->user->persona->nombre}} {{$inscribirpersona->corredor->user->persona->apellido}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <img src="{{\Storage::url($inscribirpersona->comprobante)}}" width="100%" height="100%">
      </div>
    </div>
  </div>
</div>

<!-- Modal aceptar -->
<div class="modal fade" id="aceptar_{{$inscribirpersona->id}}" tabindex="-1" role="dialog" aria-labelledby="aceptar_{{$inscribirpersona->id}}Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Verificar Pago de:  {{$inscribirpersona->corredor->user->persona->nombre}} {{$inscribirpersona->corredor->user->persona->apellido}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="comprobarPago" method="post">@csrf
          <button name="id" value="{{$inscribirpersona->id}}" type="submit" class="btn btn-success">Aceptar</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal rechazar -->
<div class="modal fade" id="rechazar_{{$inscribirpersona->id}}" tabindex="-1" role="dialog" aria-labelledby="rechazar_{{$inscribirpersona->id}}Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Rechazar metodo de pago de: {{$inscribirpersona->corredor->user->persona->nombre}} {{$inscribirpersona->corredor->user->persona->apellido}} </h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="observacion" method="post">@csrf
        <p style="text-align: left;"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>Observaciones</p>
          <input type="text" name="observacion" class="form-control">
           <button name="id" value="{{$inscribirpersona->id}}" type="submit" class="btn btn-success">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
</div>



                        @endforeach
                      </tbody>
              </table>
      </div>
    </div>
  </div>
</section>


@endsection