@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <!-- END slider -->
<section class="section body">
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
                      <th >Fecha Carrera</th>
                      <th >Nombre Carrera</th>
                      <th >Hora</th>
                      <th >Lugar salida</th>
                      <th >Lugar llegada</th>
                      <th >Modalidad</th>
                      <th >Categoria</th>
                      <th >  Monto   </th>
                      <th >Cupos</th>
                      <th >Costo camisa</th>
                      <th >Costo comida</th>
                      <th >Costo bebida</th>
                      <th >           </th>
                    </tr>
                  </thead>
                      <tbody>    
                      @foreach ($carreras as $clave => $carrera)
                      @if ($carrera->estatus == 1)
                        <tr>                              
                          <td>{{ $clave + 1}}</td>
                          <td>{{ $carrera->fecha_carr}}</td>
                          <td>{{ $carrera->nom_carrera}}</td>
                          <td>{{ $carrera->hora}}{{ $carrera->meridiano}}</td>
                          <td>{{ $carrera->lugar_salida}}</td>
                          <td>{{ $carrera->lugar_llegada}}</td>
                          <td>{{ $carrera->modalidad}}</td>
                          <td>{{ $carrera->categoria}}</td>
                          <td>{{ $carrera->monto}}</td>
                          <td>{{ $carrera->cupos}}</td>
                          <td>{{ $carrera->camisa}}</td>
                          <td>{{ $carrera->comida}}</td>
                          <td>{{ $carrera->bebida}}</td>
                          <td >
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-info btn-sm">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                              <!--Modificar-->
                              <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar_{{$carrera->id}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                              </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modificar_{{$carrera->id}}" tabindex="-1" role="dialog" aria-labelledby="modificar_{{$carrera->id}}" aria-hidden="true"> 
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modificar_{{$carrera->id}}">Datos de la carrera</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <!-- acción del botón  -->
                                      <div class="modal-body">
                                        <div class="card-body">
                                          <div class="col-md-12">
                                            <form action="modificarCarrera" method="post" enctype="multipart/form-data">@csrf
                                              <input type="hidden" name="id" value="{{$carrera->id}}">
                                              <div class="row"> 
                                                <div class="col-md-12"> 
                                                  <div class="form-group md-12">
                                                    <span style="color: red">*</span><i class="fa fa-picture-o" aria-hidden="true"></i>  Imagen publicitaria de la carrera:
                                                    <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="foto" lang="es" name="foto" accept="image/x-png image/jpeg" placeholder="Imagen de la publicidad" required="La foto debe tener el formato .jpeg o .png (imag.png o imag.jpeg por ejemplo).">
                                                      <label class="custom-file-label" for="customFileLang"></label>  
                                                    </div>    
                                                  </div>
                                                </div> 
                                              </div>
                                              <div class="row"> 
                                                <div class="col-md-12">    
                                                  <div class="form-group">
                                                    <label>
                                                      <i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre de la carrera: 
                                                    </label>
                                                    <input type="text" class="form-control" id="nom_carrera" name="nom_carrera" placeholder="Bici Rock Carrizal" value="{{ $carrera->nom_carrera}}" required="required">
                                                  </div>  
                                                  <div class="form-group">
                                                    <label for="formGroupExampleInput">
                                                      <i class="fa fa-map-marker" aria-hidden="true"></i> 
                                                      Lugar de La Carrera:
                                                    </label> 
                                                    <input type="text" class="form-control" id="lugar_salida" name="lugar_salida" placeholder="Lugar de Salida" value="{{ $carrera->lugar_salida}}" required="required">
                                                    <input type="text" class="form-control" id="lugar_llegada"name="lugar_llegada"  placeholder="Lugar de Llegada" value="{{ $carrera->lugar_llegada}}" required="required">
                                                  </div>
                                                </div>
                                              </div> 
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label>
                                                      <i class="fa fa-calendar" aria-hidden="true"></i>
                                                      Fecha de la carrera:
                                                    </label>
                                                    <input type="date" class="form-control disablecopypaste" name="fecha_carr" placeholder="fecha_carr" min="<?php echo date('Y-m-d')?>" title="El formato debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)." value="{{ $carrera->fecha_carr}}" required="required">
                                                  </div>
                                                </div>   
                                                <div class="col-md-2">
                                                  <div class="form-group">
                                                    <label>
                                                      <svg class="bi bi-alarm" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M8 15A6 6 0 108 3a6 6 0 000 12zm0 1A7 7 0 108 2a7 7 0 000 14z" clip-rule="evenodd"/>
                                                        <path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v4a.5.5 0 01-.053.224l-1.5 3a.5.5 0 11-.894-.448L7.5 8.882V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                                        <path d="M.86 5.387A2.5 2.5 0 114.387 1.86 8.035 8.035 0 00.86 5.387zM11.613 1.86a2.5 2.5 0 113.527 3.527 8.035 8.035 0 00-3.527-3.527z"/>
                                                        <path fill-rule="evenodd" d="M11.646 14.146a.5.5 0 01.708 0l1 1a.5.5 0 01-.708.708l-1-1a.5.5 0 010-.708zm-7.292 0a.5.5 0 00-.708 0l-1 1a.5.5 0 00.708.708l1-1a.5.5 0 000-.708zM5.5.5A.5.5 0 016 0h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                                        <path d="M7 1h2v2H7V1z"/>
                                                      </svg> Hora:
                                                    </label>
                                                    <input type="text" class="form-control hora" id="hora" name="hora" placeholder="00:00" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}" required="La hora debe tener el formato 00:00 (01:00 por ejemplo)." value="{{ $carrera->hora}}">            
                                                  </div>  
                                                </div>
                                                <div class="col-md-3">
                                                  <div class="form-group">
                                                    <label>
                                                      <svg class="bi bi-brightness-high" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M8 11a3 3 0 100-6 3 3 0 000 6zm0 1a4 4 0 100-8 4 4 0 000 8zM8 0a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 0zm0 13a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 13zm8-5a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2a.5.5 0 01.5.5zM3 8a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2A.5.5 0 013 8zm10.657-5.657a.5.5 0 010 .707l-1.414 1.415a.5.5 0 11-.707-.708l1.414-1.414a.5.5 0 01.707 0zm-9.193 9.193a.5.5 0 010 .707L3.05 13.657a.5.5 0 01-.707-.707l1.414-1.414a.5.5 0 01.707 0zm9.193 2.121a.5.5 0 01-.707 0l-1.414-1.414a.5.5 0 01.707-.707l1.414 1.414a.5.5 0 010 .707zM4.464 4.465a.5.5 0 01-.707 0L2.343 3.05a.5.5 0 11.707-.707l1.414 1.414a.5.5 0 010 .708z" clip-rule="evenodd"/>
                                                      </svg> Meridiano:
                                                    </label>
                                                    <select class="form-control form-control-lg" id="meridiano" name="meridiano" required="required">
                                                      <option value="am" @if($carrera->meridiano=='am')selected @endif> am</option>
                                                      <option value="pm" @if($carrera->meridiano=='pm')selected @endif> pm</option> 
                                                    </select>
                                                  </div> 
                                                </div>
                                                <div class="col-md-3">
                                                  <label class="control-label">
                                                     
                                                    <svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                      <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Cupo:
                                                  </label>
                                                  <input type="text" class="form-control" id="cupos" name="cupos" pattern='[0-9]{1,30}' required="El cupo sólo puede tener caracteres numéricos" minlength="1" maxlength="3" placeholder="0" value="{{ $carrera->cupos}}" >
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <label>
                                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>Categoria: 
                                                  </label>
                                                  <div class="form-group">
                                                     <div class="form-check form-check-inline">
                                                       <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Juvenil" @if(in_array("Juvenil",$carrera->array_categorias)) checked @endif>
                                                        <label class="form-check-label" for="Juvenil">Juvenil</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                       <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Senior" @if(in_array("Senior",$carrera->array_categorias)) checked @endif>
                                                        <label class="form-check-label" for="comidad">Senior</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Master-A" @if(in_array("Master-A",$carrera->array_categorias)) checked @endif>
                                                        <label class="form-check-label" for="bebida">Master-A</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Master-B" @if(in_array("Master-B",$carrera->array_categorias)) checked @endif>
                                                        <label class="form-check-label" for="bebida">Master-B</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="categoria" name="categoria" value="Master-C" @if(in_array("Master-C",$carrera->array_categorias)) checked @endif>
                                                        <label class="form-check-label" for="bebida">Master-C</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Master-D" @if(in_array("Master-D",$carrera->array_categorias)) checked @endif>
                                                        <label class="form-check-label" for="bebida">Master-D</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Elite" @if(in_array("Elite",$carrera->array_categorias)) checked @endif>
                                                        <label class="form-check-label" for="bebida">Elite</label>
                                                      </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">                                            
                                                <div class="col-md-4">
                                                  <label  class="control-label"><i class="fa fa-bicycle" aria-hidden="true"></i> Modalidad:</label>
                                                  <select class="form-control form-control-lg" id="modalidad" name="modalidad" required="required" >
                                                    <option value="Ruta" @if($carrera->modalidad=='Ruta') selected @endif>Ruta</option>
                                                    <option value="MTB" @if($carrera->modalidad=='MTB') selected @endif>MTB</option> 
                                                  </select> 
                                                </div> 
                                                <div class="col-md-4">
                                                  <label>
                                                    <i class="fa fa-usd" aria-hidden="true"></i> Costo:
                                                  </label>
                                                  <input type="text" class="form-control" id="monto" name="monto" pattern='[0-9]{3,30}' required="El costo sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="000.00" value="{{ $carrera->monto}}" >
                                                </div>
                                                <div class="col-md-4"> 
                                                  <label>
                                                    <i class="fa fa-money" aria-hidden="true"></i> 
                                                    Costo del kit:
                                                  </label>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" id="camisa" name="camisa" pattern='[0-9]{3,30}' title="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="Camisa" value="{{ $carrera->camisa}}" required="El valor sólo puede tener caracteres numéricos">
                                                    
                                                    <input type="text" class="form-control" id="comida" name="comida" pattern='[0-9]{3,30}' title="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="Comida" value="{{ $carrera->comida}}" required="El valor sólo puede tener caracteres numéricos">   

                                                    <input type="text" class="form-control" id="bebida" name="bebida" pattern='[0-9]{3,30}' title="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="Hidratacion" value="{{ $carrera->bebida}}" required="El valor sólo puede tener caracteres numéricos">  
                                                  </div> 
                                                </div>
                                              </div>                                                           
                                              <div class="modal-footer"> 
                                                  <button type="submit" class="btn btn-success" >Guardar</button>
                                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--Eliminar-->
                              <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$carrera->id}}">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                              </button>
                                <!-- Modal -->
                                <div class="modal fade" id="eliminar_{{$carrera->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$carrera->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="eliminarModal_{{$carrera->id}}">Eliminar...</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <!-- acción del botón  -->
                                      <form action="eliminarCarrera" method="post" enctype="multipart/form-data">@csrf
                                        <input type="hidden" name="id" value="{{$carrera->id}}">
                                          <div class="modal-body">
                                            <h4> ¿Usted está seguro que desea eliminar la carrera n◦ {{$carrera->id}}, "<b>{{$carrera->nom_carrera}}</b>" ?></h4>
                                          </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-success" >Si</button>
                                         <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                                        </div>
                                      </form> 
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
            </div>  
          </div><br>
          <div class="col-md-12" align="right">
          <a href="{{ route('listadoPDF') }}" class="btn btn-primary btn-block py-3" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
          </div>
             <!-- </form>-->
          </div>
      </div>
    </div>
  </div>
</section>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

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


