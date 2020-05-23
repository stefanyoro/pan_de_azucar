@extends('layouts.app')
 
@section('content')
 <section class="section">
  @if(Auth::user()->rol == '4')
 <h1> <p class="text-danger" align="center">Carreras Inscriptas por el Corredor</p></h1>

  @endif
  @if(Auth::user()->rol == '1')
   <h1 align="center">Inscripciones de Carreras</h1>
  <br>
  <div class="row justify-content-md-center">
    <div class="col-md-9">

  <div class="accordion" id="accordionExample">
    @endif
    @foreach($carreras as $carrera)

    @if(Auth::user()->rol == '1')
  <div class="card">

    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_{{$carrera->id}}" aria-expanded="true" aria-controls="collapse_{{$carrera->id}}">
          {{$carrera->nom_carrera}}-Lugar:{{$carrera->lugar_salida}} - Salida{{$carrera->lugar_llegada}} -hora{{$carrera->hora}}{{$carrera->meridiano}} - -categoria categoria{{$carrera->categoria}} -monto{{$carrera->monto}}
        </button>
      </h2>
    </div>

    <div id="collapse_{{$carrera->id}}" class="collapse" aria-labelledby="headingOne"  data-parent="#accordionExample">
      <div class="card-body">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Cèdula</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    @endif
    @foreach($carrera->inscribir as $clave=> $personaInscribir)
    @if(Auth::user()->rol == '1')
    @if($personaInscribir->estatus == '1')

    <tr>
      <th scope="row">{{$clave+1}}</th>
      <td>{{$personaInscribir->corredor->user->persona->nombre}}</td>
      <td>{{$personaInscribir->corredor->user->persona->apellido}}</td>
      <td>{{$personaInscribir->corredor->user->persona->numero_doc}}</td>
      <td><button class="btn btn-warning"><i class="fa fa-credit-card" aria-hidden="true"></i></button>

      <button class="btn btn-danger" data-toggle="modal"  data-toggle="modal" data-target="#supenderCorredor_{{$personaInscribir->id}}"><b><i class="fa fa-trash-o" aria-hidden="true"></i></button></b>
    </tr>
<!-- Modal eliminar -->
<div class="modal fade" id="supenderCorredor_{{$personaInscribir->id}}" tabindex="-1" role="dialog" aria-labelledby="supenderCorredor_{{$personaInscribir->id}}Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Corredor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="supenderCorredor">
        @csrf
      <div class="modal-body">
        
        Esta seguro que deseea retirar al corredor:<br> 

        Nombre: {{$personaInscribir->corredor->user->persona->nombre}} <br>Apellido:
        {{$personaInscribir->corredor->user->persona->apellido}}<br> Numero de documento:
         {{$personaInscribir->corredor->user->persona->numero_doc}}
      </div>
      <div class="modal-footer">
        <button type="submit" value="{{$personaInscribir->id}}" name="id" class="btn btn-primary">Eliminar</button>
      </div>
      </form>
    </div>
  </div>
</div>
    @endif
    @endif

    @if((Auth::user()->rol == '4') and ($personaInscribir->corredor->user_id == Auth::user()->id))
     
       <div class="row justify-content-md-center">
     <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/img/logotipo1.png" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$carrera->nom_carrera}}</h5>
        <p> Lugar:{{$carrera->lugar_salida}} - Salida{{$carrera->lugar_llegada}} -hora{{$carrera->hora}}{{$carrera->meridiano}} - -categoria categoria{{$carrera->categoria}} -monto{{$carrera->monto}}</p>
        <td><button class="btn btn-warning"><b><i class="fa fa-credit-card" aria-hidden="true"  data-toggle="modal" data-target="#modalModificarPago_{{$personaInscribir->id}}"> Modificar</i></b></button>
     
     <!-- Modal modificar -->
<div class="modal fade" id="modalModificarPago_{{$personaInscribir->id}}" tabindex="-1" role="dialog" aria-labelledby="modalModificarPago_{{$personaInscribir->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalModificarPago_{{$personaInscribir->id}}">Modificar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="modificarPago">
        @csrf
      <div class="modal-body">
        <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-circle-o" aria-hidden="true"></i> Metodo de pago:</p>  
                              <select  class="form-control" name="metodoPago" value="">
                                <option @if($personaInscribir->metodoPago == 'Pago Movil') selected @endif>Pago Movil</option>
                                <option @if($personaInscribir->metodoPago == 'Transferencia') selected @endif>Transferencia</option>
                              </select>
                            </div>  

                  <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-university" aria-hidden="true"></i>Banco emisor:</p>  
                            
                    <select class="form-control" id="banco" name="banco">
                      @foreach($bancos as $banco)
                      <option @if($personaInscribir->banco == $banco->codigo) selected @endif value="{{$banco->codigo}}">
                        {{$banco->nombre}}
                      </option>
                      @endforeach
                    </select>
                </div>
                  <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-usd" aria-hidden="true"></i>Monto:</p>  
                              <input type="number" class="form-control" name="monto" value="{{$personaInscribir->monto}}">
                          
                            </div>
                              <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>     
                            Nº de referencia:</p>
                              <input type="number" class="form-control" name="referencia" value="{{$personaInscribir->referencia}}">
                            </div>
                            <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha:</p>
                              <input type="date" class="form-control" name="fecha"  required="required" value="{{$personaInscribir->fecha}}">
                            </div> 
                             <div class="col-md-12">
                              <p style="text-align: left;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              Descripciòn:</p>
                              <input type="text" class="form-control" name="descripcion"  required="required" value="{{$personaInscribir->descripcion}}">
                            </div> 


      
      </div>
      <div class="modal-footer">
        <button type="submit" value="{{$personaInscribir->id}}" name="id" class="btn btn-warning">Actualizar</button>
      </div>
      </form>
    </div>
  </div>
</div>
 
      @csrf
      <a  href="{{route('recibo', [ 'id' => $personaInscribir->id])}}" class="btn btn-danger" value="{{$personaInscribir->id}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>PDF</a>

      </div>
    </div>
  </div>
</div>
</div>
    @endif
    @endforeach
    @if(Auth::user()->rol == '1')
  </tbody>
</table>
   
      </div>
    </div>
  </div>
 @endif
  @endforeach

</div>
 </section>

@endsection