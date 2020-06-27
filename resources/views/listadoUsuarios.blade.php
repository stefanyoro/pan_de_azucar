@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<style type="text/css">
hr {
  height: 3px;
  background-color: #B03A2E;
}
</style>

    <!-- END slider -->
<section class="section body">
	<div class="container" align="center">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        @if(session()->has('data'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('data')['mensaje']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>    
        @endif
      </div>
      
    </div>
    	<div class="col-md-12">
      		<div class="card" style="border-color:#B03A2E; background: transparent;">
        		<div class="card-header" style="background-color: #B03A2E; height: 40px;">
            		<p  style="color:white; text-align:left;"> Listado de Usuarios</p> 
        		</div>
          		<div class="card-body" style="background-color: #0000;">
	             <div class="">
	               <div class="row">
	                    <div class="col-md-12 table-responsive"> 
		                    <table id="listadoUsuarios" class="table table-borderless">
		                        <thead>  
		                          <tr>
		                            <th >N◦</th>
		                            <th >Nombre</th>
		                            <th >Correo</th>
		                            <th >rol</th>
		                          </tr>
		                        </thead>
		                        <tbody>
		                            	@foreach ($usuarios as $clave => $usuario)
                                    @if($usuario->estatus == '1')
                                    <tr>
                                      <td>{{ $clave + 1}}</td>
			                                <!-- <td>{{ $usuario->id}}</td>-->
			                                <td>{{ $usuario->name}}</td>
			                                <td>{{ $usuario->email}}</td>
                                      @if($usuario->rol == '1')
			                                   <td>Administrador</td>
                                      @endif
                                      @if($usuario->rol == '2')
                                         <td>Entrenador</td>
                                      @endif
                                      @if($usuario->rol == '3')
                                         <td>Nutricionista</td>
                                      @endif
                                      @if($usuario->rol == '4')
                                         <td>Corredor</td>
                                      @endif

                                      <td>
                                      
                                      <!-- visualizar -->
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$usuario->id}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                          </button>
                                          <!-- Modal -->
                                            <div class="modal fade" id="visualizar_{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$usuario->id}}" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header" style="text-align: center;">
                                                        <h5 class="modal-title" id="visualizarModal_{{$usuario->id}}">{{$usuario->name}} {{$usuario->persona->apellido}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                        <!-- acción del botón  -->
                                                          <div class="modal-body">
                                                              <div class="card-body">
                                                                <div class="row">
                                                                  <div class="col-md-5"></div>
                                                                  <div class="col-md-6">
                                                                    <img src="{{\Storage::url(Auth::user()->img)}}" class="rounded-circle" alt="..." style="height: 150px; width: 150px;">
                                                                  </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                  <div class="col-md-6"><b>Nacionalidad:</b> {{$usuario->persona->nacionalidad}} </div>
                                                                  <div class="col-md-6"><b>N° documento:</b> {{$usuario->persona->numero_doc}}</div>
                                                                </div><br>
                                                                <div class="row">
                                                                  <div class="col-md-4"><b>Sexo:</b> {{$usuario->persona->sexo}} </div>
                                                                  <div class="col-md-8"><b>Fecha de nacimiento: </b> {{$usuario->persona->fecha_nac}}</div>
                                                                </div><br>
                                                                <div class="row">
                                                                  <div class="col-md-12"><b>Correo: </b> {{$usuario->email}}</div>
                                                                </div>
                                                                <hr></hr>
                                                                
                                                                 <div class="row">
                                                                  <div class="col-md-6"><b>Telefono móvil:</b> {{$usuario->persona->telf_celular}} </div>
                                                                  <div class="col-md-6"><b>Telefono local: </b> {{$usuario->persona->telf_local}}</div>
                                                                </div><br>

                                                              </div>
                                                          </div>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>

                                      <!--Eliminar-->
                                        <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$usuario->id}}">
                                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                            <!-- Modal -->
                                              <div class="modal fade" id="eliminar_{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$usuario->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="eliminarModal_{{$usuario->id}}">Eliminar...</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <!-- acción del botón  -->
                                                      <form action="eliminarUsuario" method="post" enctype="multipart/form-data">@csrf
                                                        <input type="hidden" name="id" value="{{$usuario->id}}">
                                                        <div class="modal-body">
                                                          <h4> ¿Usted está seguro que desea inhabilitar al usuario "<b>{{$usuario->name}}</b>"?</h4>
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
          var tabla = $("#listadoUsuarios").DataTable( {
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