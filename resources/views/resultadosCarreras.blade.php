@extends('layouts.app')

@section('content')
<section class="section">
  <!-- END slider -->
  <div class="container" align="left">
    <div class="col-md-12">
      <div class="card" style="border-color:#B03A2E; background: transparent; padding: 0PX 0PX 20PX;">        
        <div class="card-header" style="background-color: #B03A2E; height: 40px;">
            <p  style="color:white; text-align:left;"> Registro de Resultados</p> 
        </div>
        <!--Datos de las carreras-->
        <div class="accordion" id="accordionExample">
          @foreach($carreras as $carrera)
          @if ($carrera->estatus == 1)                  
            <div class="accordion" id="accordionExample_{{$carrera->id}}">
              <div class="col-md-12">          
                <div class="card">
                  <div class="card-header" id="headingOne" style="border-color:#B03A2E; background: transparent;">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_{{$carrera->id}}" aria-expanded="true" aria-controls="collapse_{{$carrera->id}}">
                        <p  style="color:#B03A2E; font-family: arial;"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$carrera->nom_carrera}} - {{$carrera->fecha_carr}} - Categorias: {{$carrera->categoria}}</p>
                      </button>
                    </h5>
                  </div> 
                  <!--Datos de los corredores-->
                  <div id="collapse_{{$carrera->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <table class="table">
                        <thead style="background-color: #B03A2E;">
                          <tr>
                            <th style="color:#FFFF;"> N◦</th>
                            <th style="color:#FFFF;"> Documento</th>
                            <th scope="col" style="color:#FFFF;"> Nombre</th>
                            <th scope="col" style="color:#FFFF;"> Apellido</th>
                            <th scope="col" style="color:#FFFF;">         </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($carrera->inscribir as $clave=> $personaInscribir)
                          @if($personaInscribir->estatus == '0')
                            <tr>
                              <th scope="row">{{$clave+1}}</th>
                              <td>{{$personaInscribir->corredor->user->persona->numero_doc}}</td>
                              <td>{{$personaInscribir->corredor->user->persona->nombre}}</td>
                              <td>{{$personaInscribir->corredor->user->persona->apellido}}</td>                              
                              <td>                                
                                <!-- Datos de la carrera-->  
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#resultado_{{$personaInscribir->id}}"class="btn btn-outline-info btn-sm">
                                    Datos
                                  </button>                                
                                  <!-- Modal Datos -->
                                  <div class="modal fade" id="resultado_{{$personaInscribir->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Resultados carerera {{$carrera->modalidad}} </h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <!-- acción del botón  -->
                                        <div class="modal-body">
                                        Ingrese los datos de {{$personaInscribir->corredor->user->persona->nombre}} {{$personaInscribir->corredor->user->persona->apellido}} en la carrera "{{$carrera->nom_carrera}}". <br><br> 
                                          <form method="post" action="resultadosCarreras">@csrf
                                            <input type="text" value="{{$personaInscribir->id}}" name="id" hidden>
                                            <div class="row"> 
                                              <div class="col-md-6">
                                                <i class="fa fa-arrows" aria-hidden="true"></i> Vueltas
                                                <input type="text" class="form-control" id="vuelta" pattern='[0-9]{1,30}' title="El monto sólo puede tener caracteres numéricos" minlength="1" maxlength="3" required="El valor sólo puede tener caracteres numéricos" value="{{$carrera->vuelta}}" disabled>
                                              </div>                                                  
                                              <div class="col-md-6">
                                                <i class="fa fa-trophy" aria-hidden="true"></i> Posicion
                                                <input type="text" class="form-control" id="posicion" name="posicion" pattern='[0-9]{1,30}' title="El monto sólo puede tener caracteres numéricos" minlength="1" maxlength="3" placeholder="Posicion" required="El valor sólo puede tener caracteres numéricos">
                                              </div>
                                            </div>
                                            <div class="row">
                                              @for($i=1; $i<=$carrera->vuelta; $i++)
                                              <div class="col-md-12">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i> Tiempo 
                                                <div class="tiempos col-md-12">
                                                  <input type="text" class="form-control tiempo" id="tiempo" name="tiempo[]" placeholder="00:00:00"  required="La tiempo debe tener el formato 00:00:00 (01:00:59 por ejemplo)." value="">
                                                </div>
                                              </div>
                                              @endfor
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" name="id" value="{{$personaInscribir->id}}" class="btn btn-success" >Guardar</button>
                                              <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                      <div class="col-md-12" align="center">
                        <div class="btn-group" role="group">
                          <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#publicar_{{$carrera->id}}">
                              Publicar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="publicar_{{$carrera->id}}" tabindex="-1" role="dialog" aria-labelledby="publicarModal_{{$carrera->id}}" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header"><!-- acción del botón Eliminar -->                        
                                    <form action="publicarCarrera" method="post" enctype="multipart/form-data">@csrf
                                      <input type="hidden" name="id" value="{{$carrera->id}}">
                                      <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 style="text-align: center;"> 
                                          Se han publicado con éxito los resultados de los corredores pertenecientes a la carrera "<b>{{$carrera->nom_carrera}}</b>"
                                        </h3>                                        
                                      </div>                                        
                                    </form>
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
            </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div> 
</section>
@endsection