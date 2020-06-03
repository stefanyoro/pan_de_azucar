@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<!-- END slider -->
<section class="section body">
  <div class="container" align="left">
    <div class="col-md-12">
      <div class="card" style="border-color:#B03A2E; background: transparent;">        
        <div class="card-header" style="background-color: #B03A2E; height: 40px;">
            <p  style="color:white; text-align:left;"> Registro de Resultados</p> 
        </div>
        <!--Datos de las carreras-->
        @foreach($carreras as $carrera) 
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
              <div id="collapse_{{$carrera->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample_{{$carrera->id}}">
                <div class="card-body">
                  <div class="card-body" style="background-color: #0000;">
                    <div class="row">
                      <div class="col-md-12 table-responsive"> 
                        <table id="listarcarrera" class="table">
                          <thead>  
                            <tr>
                              <th > N◦</th>
                              <th > Documento</th>
                              <th > Nombre</th>
                              <th > Apellido</th>
                              <th > categoria</th>
                              <th > </th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($carrera->inscribir as $cont=> $personaInscribir)
                                <tr>
                                  <td>{{ $cont + 1}} </td>
                                  <td>{{$personaInscribir->corredor->user->persona->numero_doc}}</td>
                                  <td>{{$personaInscribir->corredor->user->persona->nombre}}</td>
                                  <td>{{$personaInscribir->corredor->user->persona->apellido}}</td>
                                  <td>{{$personaInscribir->corredor->user->persona->categoria}}</td>
                                  
                                  <td>     
                                    <!--<form action="listarCarrera" method="post">@csrf-->
                                    <!-- Datos de la carrera-->  
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#resultado_{{$personaInscribir->id}}"class="btn btn-outline-info btn-sm">
                                        Datos
                                      </button>
                                      <!-- Modal -->
                                      <div class="modal fade" id="resultado_{{$personaInscribir->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Resultados carerera {{$carrera->modalidad}} </h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              Ingrese los datos de {{$personaInscribir->corredor->user->persona->nombre}} {{$personaInscribir->corredor->user->persona->apellido}} en la carrera "{{$carrera->nom_carrera}}". <br><br> 
                                              <form method="post" action="resultadosCarreras">@csrf
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i> Vueltas
                                                    <input type="text" class="form-control" id="vuelta" name="vuelta" pattern='[0-9]{1,30}' title="El monto sólo puede tener caracteres numéricos" minlength="1" maxlength="3" placeholder="Vueltas" required="El valor sólo puede tener caracteres numéricos">
                                                  </div>

                                                  <div class="col-md-4">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Tiempo 
                                                    <input type="text" class="form-control tiempo" id="tiempo" name="tiempo" placeholder="00:00:00" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}:[0-5]{1}\d{1}" required="La tiempo debe tener el formato 00:00:00 (01:00:59 por ejemplo)." value="">
                                                  </div>

                                                  <div class="col-md-4">
                                                    <i class="fa fa-trophy" aria-hidden="true"></i> Posicion
                                                    <input type="text" class="form-control" id="posicion" name="posicion" pattern='[0-9]{1,30}' title="El monto sólo puede tener caracteres numéricos" minlength="1" maxlength="3" placeholder="Posicion" required="El valor sólo puede tener caracteres numéricos">
                                                  </div>
                                                </div>
                                              </form>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" name="id" value="{{$personaInscribir->id}}" class="btn btn-success" >Guardar</button>                                        
                                              <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>                
            </div> 
          </div>
        </div>
        @endforeach  
      </div>
    </div>
  </div>
</section>
@endsection

  @section('scriptJS')
  <!--tabla de listar carreras-->
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script>
       $(document).ready(function(){
        //$("#listarcarrera").DataTable();
        var tabla = $("#listarcarrera").DataTable( {
          "language": {
                "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          }
        });
      });
  </script>
@endsection