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
            		<p  style="color:white; text-align:left;"> Listado de Usuarios</p> 
        		</div>
          		<div class="card-body" style="background-color: #0000;">
	            <div class="">
	             
	                <div class="row">
	                    <div class="col-md-12 table-responsive"> 
		                    <table id="listadoUsuarios" class="table table-borderless">
		                        <thead style="text-align: center;">  
		                          <tr>
		                            <th >N◦</th>
		                            <th >Nombre</th>
		                            <th >Correo</th>
		                            <th >rol</th>
		                          </tr>
		                        </thead>
		                            <tbody>
		                            	@foreach ($usuarios as $clave => $usuario)
                              <tr>
                                      <td>{{ $clave + 1}}</td>
			                                <!-- <td>{{ $usuario->id}}</td>-->
			                                <td>{{ $usuario->name}}</td>
			                                <td>{{ $usuario->email}}</td>
			                                <td>{{ $usuario->rol}}</td>
			                               
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