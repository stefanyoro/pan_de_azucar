@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('content')

    <!-- END slider -->
<section class="section body" style="background-color:#DBDBDB;">
  <div class="container" align="center">
    <div class="col-md-12">
      <div class="card" style="border-color:#B03A2E; background: transparent;">
        <div class="card-header" style="background-color: #B03A2E; height: 40px;">
            <p  style="color:white; text-align:left;"> Listado de la Carrera</p> 
          </div>
          <div class="card-body" style="background-color: #0000;">
            <div class="">
              <form action="listaCarrera" method="post">@csrf
                 
                      

                  <div class="row">
                    <div class="col-md-12 table-responsive"> 
                    <table id="listarcarrera" class="table">
                        <thead>  
                          <tr>
                            <th >N◦</th>
                            <th >Nombre Carrera</th>
                            <th >Lugar de salida</th>
                            <th >Lugar de llegada</th>
                            <th >Fecha Carrera</th>
                            <th >Hora</th>
                            <th >Modalidad</th>
                            <th >Categoria</th>
                            <th >  Monto   </th>
                            <th >Cupos</th>
                            <th >Kit Carrera</th>
                            <th >holaaa</th>
                          </tr>
                        </thead>
                            <tbody>
                            @foreach ($carreras as $carrera)
                              <tr>
                                <td >1</td>
                                <td>{{ $carrera->nom_carrera}}</td>
                                <td>{{ $carrera->lugar_salida}}</td>
                                <td>{{ $carrera->lugar_llegada}}</td>
                                <td>{{ $carrera->fecha_carr}}</td>
                                <td>{{ $carrera->hora}}{{ $carrera->meridiano}}</td>
                                <td>{{ $carrera->modalidad}}</td>
                                <td>{{ $carrera->categoria}}</td>
                                <td>{{ $carrera->monto}}</td>
                                <td>{{ $carrera->cupos}}</td>
                                <td>Hidratación</td>
                                <td ><!--
                                  <div class="btn-group" role="group" aria-label="Basic example">-->
                                    <button type="button" class="btn btn-outline-info btn-sm">
                                        <svg class="bi bi-eye" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z" clip-rule="evenodd"/>
                                          <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-outline-warning btn-sm">
                                        <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    
                                      <button type="button" class="btn btn-outline-danger btn-sm">
                                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                                        </svg>
                                      </button>
                                    <!--</div>-->
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>  
                  </div><br>
                  <div class="col-md-12" align="right">
                    <input type="submit" class="btn btn-primary btn-block py-3" value="PDF" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
                  </div>
                </form>
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


