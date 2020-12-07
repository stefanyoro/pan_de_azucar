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
            		<p  style="color:white; text-align:left;"> Listado de planes</p> 
        		</div>
          		<div class="card-body" style="background-color: #0000;">
	            <div class="">
	             
	                <div class="row">
	                    <div class="col-md-12 table-responsive"> 
		                    <table id="listadoPlanes" class="table table-borderless">
		                        <thead>  
		                          <tr>
		                            <th>N◦</th>
		                            <th>Corredor</th>
		                            <th>Correo</th>
                                <th>Nombre del Plan</th>
                                <th>Fecha</th>
		                            <th>Acciones</th>
		                          </tr>
		                        </thead>
		                            <tbody>
		                            	@foreach ($planes as $clave => $plan)
		                            		@foreach ($usuarios as $usuario)
		                            			@if($plan->corredor_id == $usuario->id)
				                              	<tr>
				                                	<td>{{ $clave + 1}}</td>
							                        <td>{{ $usuario->name}}</td>
							                        <td>{{ $usuario->email}}</td>
                                      <td>{{ $plan->nombre_plan}}</td>
                                      <td>{{ $plan->fecha}}</td>
							                        <td >
                            <!-- visualizar -->
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$plan->id}}">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                              <!-- Modal -->
                                <div class="modal fade" id="visualizar_{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$plan->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="visualizarModal_{{$plan->id}}">Plan Alimenticio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <!-- acción del botón  -->
                                      <div class="modal-body">
                                        <div class="row">
                                        	<div class="col-md-9">
                                        		<b>Nombre:</b> {{$usuario->name}}<br>
                                        		<b>Cédula:</b> {{$usuario->persona->numero_doc}}<br>
                                        		<b>Sexo:</b> {{$usuario->persona->sexo}}<br>
                                        		<b>Correo:</b> {{$usuario->email}}<br>
                                        	</div>
                                        	<div class="col-md-3">
                                        		<img src="{{\Storage::url($usuario->img)}}" width="100%" height="80%">
                             
                                        	</div>
                                        </div>
                                        <p style="text-align:center;"><b>Plan alimenticio personalizado</b></p>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <b>Nombre:</b> {{$plan->nombre_plan}}
                                          </div>
                                          <div class="col-md-6">
                                            <b>Fecha:</b> {{$plan->fecha}}
                                          </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <b>Descripción:</b> {{$plan->descripcion}}.
                                            </div>
                                          
                                          </div>
                                          <br>
                                          <p style="text-align:left; color:#B03A2E;"><b>Leche y Derivados</b></p>
                                          <div class="row">
                                            <div class="col-md-6">
                                              @foreach ($leches as $leche)
                                                @if($leche->id == $plan->id_leche)
                                                <b>Tipo:</b> {{$leche->nombre}} 
                                                @endif
                                              @endforeach
                                            </div>
                                            <div class="col-md-6">
                                              <b>Porción:</b> {{$plan->porcion_leche}} 
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <b>Equivalente:</b> {{$plan->equivalente_leche}} 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Días:</b> {{$plan->dias_leche}} 
                                            </div>
                                          </div><br>
                                          <!--Carnes, pescado y huevos-->
                                          <p style="text-align:left; color:#B03A2E;"><b>Carnes, pescado y huevos</b></p>
                                          <div class="row">
                                            <div class="col-md-6">
                                              @foreach ($carnes as $carne)
                                                @if($carne->id == $plan->id_carnes)
                                                <b>Tipo:</b> {{$carne->nombre}} 
                                                @endif
                                              @endforeach
                                            </div>
                                            <div class="col-md-6">
                                              <b>Porción:</b> {{$plan->porcion_carne}} 
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <b>Equivalente:</b> {{$plan->equivalente_carne}} 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Días:</b> {{$plan->dias_carne}} 
                                            </div>
                                          </div><br>
                                          <!-- Legumbres y frutos secos -->
                                          <p style="text-align:left; color:#B03A2E;"><b>Legumbres y frutos secos</b></p>
                                          <div class="row">
                                            <div class="col-md-6">
                                             @foreach ($legumbres as $legumbre)
                                                @if($legumbre->id == $plan->id_legumbres)
                                                <b>Tipo:</b> {{$legumbre->nombre}} 
                                                @endif
                                              @endforeach
                                            </div>
                                            <div class="col-md-6">
                                              <b>Porción:</b> {{$plan->porcion_legumbre}} 
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <b>Equivalente:</b> {{$plan->equivalente_legumbre}} 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Días:</b> {{$plan->dias_legumbre}} 
                                            </div>
                                          </div><br>
                                          <!--Hortalizas -->
                                          <p style="text-align:left; color:#B03A2E;"><b>Hortalizas</b></p>
                                          <div class="row">
                                            <div class="col-md-6">
                                              @foreach ($hortalizas as $hortaliza)
                                                @if($hortaliza->id == $plan->id_hortalizas)
                                                <b>Tipo:</b> {{$hortaliza->nombre}} 
                                                @endif
                                              @endforeach 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Porción:</b> {{$plan->porcion_hortaliza}} 
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <b>Equivalente:</b> {{$plan->equivalente_hortaliza}} 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Días:</b> {{$plan->dias_hortaliza}} 
                                            </div>
                                          </div><br>
                                          <!-- Frutas -->
                                          <p style="text-align:left; color:#B03A2E;"><b>Frutas</b></p>
                                          <div class="row">
                                            <div class="col-md-6">
                                              @foreach ($frutas as $fruta)
                                                @if($fruta->id == $plan->id_frutas)
                                                <b>Tipo:</b> {{$fruta->nombre}} 
                                                @endif
                                              @endforeach
                                            </div>
                                            <div class="col-md-6">
                                              <b>Porción:</b> {{$plan->porcion_fruta}} 
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <b>Equivalente:</b> {{$plan->equivalente_fruta}} 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Días:</b> {{$plan->dias_fruta}} 
                                            </div>
                                          </div><br>
                                          <!-- Cereales -->
                                          <p style="text-align:left; color:#B03A2E;"><b>Cereales</b></p>
                                          <div class="row">
                                            <div class="col-md-6">
                                              @foreach ($cereales as $cereal)
                                                @if($cereal->id == $plan->id_cereales)
                                                <b>Tipo:</b> {{$cereal->nombre}} 
                                                @endif
                                              @endforeach
                                            </div>
                                            <div class="col-md-6">
                                              <b>Porción:</b> {{$plan->porcion_cereal}} 
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <b>Equivalente:</b> {{$plan->equivalente_cereal}} 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Días:</b> {{$plan->dias_cereal}} 
                                            </div>
                                          </div><br>
                                          <!--Manteca y Aceites-->
                                          <p style="text-align:left; color:#B03A2E;"><b>Manteca y aceites</b></p>
                                          <div class="row">
                                            <div class="col-md-6">
                                              @foreach ($aceites as $aceite)
                                                @if($aceite->id == $plan->id_aceites)
                                                <b>Tipo:</b> {{$aceite->nombre}} 
                                                @endif
                                              @endforeach
                                            </div>
                                            <div class="col-md-6">
                                              <b>Porción:</b> {{$plan->porcion_aceite}} 
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <b>Equivalente:</b> {{$plan->equivalente_aceite}} 
                                            </div>
                                            <div class="col-md-6">
                                              <b>Días:</b> {{$plan->dias_aceite}} 
                                            </div>
                                          </div><br>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            
                            <!--Eliminar-->
                              <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$plan->id}}">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                              </button>
                                  <!-- Modal -->
                                    <div class="modal fade" id="eliminar_{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$plan->id}}" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModal_{{$plan->id}}">Eliminar...</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <!-- acción del botón  -->
                                            <form action="eliminarPlanA" method="post" enctype="multipart/form-data">@csrf
                                              <input type="hidden" name="id" value="{{$plan->id}}">
                                              <div class="modal-body">
                                                <h4> ¿Usted está seguro que desea eliminar el plan "<b>{{$plan->nombre_plan}}</b>" ?</h4>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" >Si</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                              </div>
                                            </form> 
                                        </div>
                                      </div>
                                    </div>
                          </td>
						                        </tr>
						                        @endif
						                	@endforeach    
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
</section>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script type="text/javascript">
 
</script>
@endsection

@section('scriptJS')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
         $(document).ready(function(){
          //$("#list").DataTable();
          var tabla = $("#listadoPlanes").DataTable( {
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