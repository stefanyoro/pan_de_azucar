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
        @if(session()->has('data'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('data')['mensaje']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>    
        @endif
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
		                            <th>Acciones</th>
		                          </tr>
		                        </thead>
		                            <tbody>
		                            	@foreach ($planes as $clave => $plan)
		                            		@foreach ($usuarios as $usuario)
		                            			@if($plan->corredor_id == $usuario->id)
                                      @if($plan->status == 1)
				                              	<tr>
				                                	<td>{{ $clave + 1}}</td>
							                        <td>{{ $usuario->name}}</td>
							                        <td>{{ $usuario->email}}</td>
                                      <td>{{ $plan->nombre}}</td>
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
                                        <h5 class="modal-title" id="visualizarModal_{{$plan->id}}">Plan de Entrenamiento</h5>
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
                                        <p style="text-align:center;"><b>Plan de entrenamiento personalizado</b></p>
                                        <p style="text-align:left; color: #B03A2E;"><b>MTB</b></p>
                                      
                                        <div class="row">
                                        	<div class="col-md-6">
                                        		<b>Tiempo:</b> {{$plan->mtb->tiempo}}
                                        	</div>
                                        	<div class="col-md-6">
                                        		<b>Intensidad:</b> {{$plan->mtb->intensidad}}
                                        	</div>
                                        </div><br>
                                        <div class="row">
                                        	<div class="col-md-6">
                                        		<b>Cadencia:</b> {{$plan->mtb->cadencia}}
                                        	</div>
                                        	<div class="col-md-6">
                                        		<b>Días:</b> {{$plan->mtb->dias}}
                                        	</div>
                                        </div><br>
                                        <p style="text-align:left; color: #B03A2E;"><b>RUTA</b></p>
                                      
                                        <div class="row">
                                        	<div class="col-md-6">
                                        		<b>Tiempo:</b> {{$plan->ruta->tiempo}}
                                        	</div>
                                        	<div class="col-md-6">
                                        		<b>Intensidad:</b> {{$plan->ruta->intensidad}}
                                        	</div>
                                        </div><br>
                                        <div class="row">
                                        	<div class="col-md-6">
                                        		<b>Cadencia:</b> {{$plan->ruta->frecuencia}}
                                        	</div>
                                        	<div class="col-md-6">
                                        		<b>Días:</b> {{$plan->ruta->dias}}
                                        	</div>
                                        </div><br>
                                        <p style="text-align:left; color:#B03A2E;"><b>GIMNASIO</b></p>
                                      
                                        <div class="row">
                                        	<div class="col-md-6">
                                        		@if ($plan->gimnasio->zona == '1')
                                        		<b>Zona:</b> Abdomen
                                        		@endif
                                        		@if ($plan->gimnasio->zona == '2')
                                        		<b>Zona:</b> Brazos
                                        		@endif
                                        		@if ($plan->gimnasio->zona == '3')
                                        		<b>Zona:</b> Espalda
                                        		@endif
                                        		@if ($plan->gimnasio->zona == '4')
                                        		<b>Zona:</b> Hombros
                                        		@endif
                                        		@if ($plan->gimnasio->zona == '5')
                                        		<b>Zona:</b> Pecho
                                        		@endif
                                        		@if ($plan->gimnasio->zona == '6')
                                        		<b>Zona:</b> Piernas
                                        		@endif
                                        	</div>
                                        	<div class="col-md-6">
                                           
                                        		<b>Nombre:</b> {{$plan->gimnasio->ejercicios->nombre}}
                                          </div>
                                        </div><br>
                                        <div class="row">
                                        	<div class="col-md-4">
                                        		<b>Series:</b> {{$plan->gimnasio->series}} 4
                                        	</div>
                                        	<div class="col-md-4">
                                        		<b>Repeticiones:</b> {{$plan->gimnasio->repeticiones}} 12
                                        	</div>
                                        	<div class="col-md-4">
                                        		<b>Peso:</b> {{$plan->gimnasio->peso}} 40 kg
                                        	</div>
                                        </div><br>
                                        <div class="row">
                                          <div class="col-md-6">
                                              <b>Días:</b> {{$plan->gimnasio->dias}}                                            
                                          </div>
                                          
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
                                            <form action="eliminarPlanE" method="post" enctype="multipart/form-data">@csrf
                                              <input type="hidden" name="id" value="{{$plan->id}}">
                                              <div class="modal-body">
                                                <h4> ¿Usted está seguro que desea eliminar el plan "<b>{{$plan->nombre}}</b>" ?</h4>
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