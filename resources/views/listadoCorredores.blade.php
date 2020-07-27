@extends('layouts.app')

@section('content')
<section class="section">
  @if(Auth::user()->rol == '4')


  <div class="col-md-8 offset-md-2">
  <div class="card" style="border-color:#B03A2E; background: transparent;">
				<div class="card-header" style="background-color: #B03A2E;">
          <a style="color: white;">Inscripciòn Corredor</a>
         
				</div>
				<div class="row">

  @endif
  @if(Auth::user()->rol == '1')
  
  <div class="col-md-8 offset-md-2">
  <div class="card" style="border-color:#B03A2E; background: transparent;">
				<div class="card-header" style="background-color: #B03A2E;">
					<a style="color: white;">Inscripciòn Corredor</a>
				</div>
				<div class="row">
					
        
 
  <div class="row justify-content-md-center">
    <div class="col-md-9">

      <div class="accordion" id="accordionExample">
        @endif
        @foreach($carreras as $carrera)

        @if(Auth::user()->rol == '1')
        <div class="card">

          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button style="color:#B03A2E;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_{{$carrera->id}}" aria-expanded="true" aria-controls="collapse_{{$carrera->id}}">
                {{$carrera->nom_carrera}}-Lugar:{{$carrera->lugar_salida}} - Salida{{$carrera->lugar_llegada}} -hora{{$carrera->hora}}{{$carrera->meridiano}} - -categoria categoria{{$carrera->categoria}} -monto{{$carrera->monto}}
              </button>
            </h2>
          </div>

          <div id="collapse_{{$carrera->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <table class="table">
                <thead style="background-color: #B03A2E;">
                  <tr>
                    <th style="color:#FFFF;" scope="col">#</th>
                    <th style="color:#FFFF;" scope="col">Nombre</th>
                    <th style="color:#FFFF;" scope="col">Apellido</th>
                    <th style="color:#FFFF;" scope="col">Cèdula</th>
                    <th style="color:#FFFF;" scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @endif
                  @foreach($carrera->inscribir as $clave=> $personaInscribir)
                  @if(Auth::user()->rol == '1')
                  @if($personaInscribir->estatus == '0')

                  <tr>
                    <th scope="row">{{$clave+1}}</th>
                    <td>{{$personaInscribir->corredor->user->persona->nombre}}</td>
                    <td>{{$personaInscribir->corredor->user->persona->apellido}}</td>
                    <td>{{$personaInscribir->corredor->user->persona->numero_doc}}</td>
                    <td>
                      
                      <button class="btn btn-danger" data-toggle="modal" data-toggle="modal" data-target="#supenderCorredor_{{$personaInscribir->id}}"><b><i class="fa fa-trash-o" aria-hidden="true"></i></button></b>
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
  
                 <div class="row" style="padding:10px;">
                    <div class="col-md-12">
                      
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <!-- <img src="/img/logotipo1.png" class="card-img" alt="..."> -->
                            <div class="col-md-8 offset-md-2">
                            <img src="{{\Storage::url($personaInscribir->carrera->foto)}}" width="100%" height="100%">
                          </div>
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{$carrera->nom_carrera}}</h5>
                              <p> Lugar:{{$carrera->lugar_salida}} - Salida{{$carrera->lugar_llegada}} -hora{{$carrera->hora}}{{$carrera->meridiano}} - -categoria categoria{{$carrera->categoria}} -monto{{$carrera->monto}}</p>

                              @if($personaInscribir->estatus != 0)
                              <button type="submit" class="btn btn-warning" value="{{$personaInscribir->id}}" aria-hidden="true" data-toggle="modal" data-target="#modalModificarPago_{{$personaInscribir->id}}"><i class="fa fa-credit-card"></i>Modificar</button>
                              @endif
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
                                    <form method="post" action="modificarPago" enctype="multipart/form-data">
                                      @csrf
                                      <div class="modal-body">
                                        <div class="col-md-12">
                                          <div class="col-md-12">
                                            <p style="text-align: left;"><i class="fa fa-circle-o" aria-hidden="true"></i> Capture de Pantalla:</p>
                                            <input type="file" class="form-control" name="comprobante">
                                          </div>
                                          <p style="text-align: left;"><i class="fa fa-circle-o" aria-hidden="true"></i> Metodo de pago:</p>
                                          <select class="form-control" name="metodoPago" value="">
                                            <option @if($personaInscribir->metodoPago == 'Pago Movil') selected @endif>Pago Movil</option>
                                            <option @if($personaInscribir->metodoPago == 'Transferencia')selected @endif>Transferencia</option>
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
                                          <input type="date" class="form-control" name="fecha" required="required" value="{{$personaInscribir->fecha}}">
                                        </div>
                                        <div class="col-md-12">
                                          <p style="text-align: left;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Descripciòn:</p>
                                          <input type="text" class="form-control" name="descripcion" required="required" value="{{$personaInscribir->descripcion}}">
                                        </div>



                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" value="{{$personaInscribir->id}}" name="id" class="btn btn-warning">Actualizar</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                              @if($personaInscribir->estatus == 0)
                              <a href="{{route('recibo', [ 'id' => $personaInscribir->id])}}" class="btn btn-danger" value="{{$personaInscribir->id}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Recibo PDF</a>
                              <a href="{{route('numero', [ 'id' => $personaInscribir->id])}}" class="btn btn-danger" value="{{$personaInscribir->id}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Numero PDF</a>
                              @endif
                              <!-- Button trigger modal -->
                              @if($personaInscribir->estatus != 0)
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$personaInscribir->id}}">
                                Comprobante
                              </button>

                              @endif
                              <br><br>
                              <p style="color:red;">{{$personaInscribir->observacion}}</p>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal_{{$personaInscribir->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal_{{$personaInscribir->id}}_Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModal_{{$personaInscribir->id}}_Label">Comprobante</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">


                                      <img src="{{\Storage::url($personaInscribir->comprobante)}}" width="100%" height="100%">
                                    </div>

                                  </div>
                                </div>
                              </div>
                      
                            </div>
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
      </div>
          </div>
          </div>
          </div>
          </div>
          </div>
</section>

@endsection