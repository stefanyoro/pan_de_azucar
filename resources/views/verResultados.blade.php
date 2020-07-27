@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection 
@section('content')

<section class="section">
  <div class="container" align="left">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="card " style="border-color:#B03A2E; background: transparent;">        
            <div class="card-header" style="background-color: #B03A2E; height: 40px; width: 100%">
              <p  style="color:white; text-align:left;"> Resultados </p> 
            </div>
            <div class="card-body">
              <div class="card col-md-12">
                <div class="card-body">
                  <h5 class="card-title">
                    <div class="row">
                      <div class="col-md-2"> Carrera:</div> 
                        <!-- Button trigger modal -->
                          <div class="col-md-10" align="right">
                            <p class="card-text" align="center">
                              <input class="form-control form-control-lg" type="text" value="" style="text-align: center;" placeholder="Rodada 1" disabled> {{$carrera->nom_carrera}}
                            </p>                            
                          </div>
                        </div>
                      </h5>                                          
                    </div>
                  </div>
                <div class=" col-md-12" style="padding: 20px;">
                
                <div class="row">
                  <div class="col-md-12 table-responsive"> 
                    <table id="listarcarrera" class="table">
                      <thead>  
                        <tr>
                          <th > N◦</th>
                          <th > Nombre</th>
                          <th > Categoría</th>
                          <th > Posicion</th>
                          <th > Tiempo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>25702416</td>
                          <td>Stefany Oropeza</td>
                          <td>Senior</td>
                          <td><i class="fa fa-star" aria-hidden="true"></i> 03 </td>
                          <td>
                            <!-- Tiempo -->
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#exampleModal" title="Tiempo del corredor">
                             <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tiempos de: "Stefany Oropeza"</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <!-- acción del botón  -->
                                  <div class="modal-body">
                                    
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Vuelta 1
                                    <div class="tiempos col-md-12">
                                      <input type="text" class="form-control tiempo" id="tiempo" name="tiempo[]" placeholder="00:48:53" value="" disabled>
                                    </div>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Vuelta 2
                                    <div class="tiempos col-md-12">
                                      <input type="text" class="form-control tiempo" id="tiempo" name="tiempo[]" placeholder="00:30:53" value="" disabled>
                                    </div>                         
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>                          
                    </table>                     
                    <div class="col-md-12" align="left">
                      <div class="btn-group" role="group">
                        <a style="background-color: #B03A2E;" title="PDF Carrera" class="btn btn-primary btn-sm" target="_blank" href="{{ route('resultadosPDF') }}">
                          <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        </a>                   
                      </div>
                    </div>              
                  </div>
                </div> 
              </div>
            </div> 
          </div>
        </div>
        <!--<div class="card col-md-5" align="center">
          <div class="card-body">
            <h1 class="card-title">Deja tu comentario</h1>
            <p class="card-text" >...En construcción...</p>
            <a href="#" class="btn btn-primary" style="padding: 5px 85px">Comenta</a>
          </div>
        </div>-->
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