@extends('layouts.app')

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
        <div class="accordion" id="accordionExample">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" id="headingOne" style="border-color:#B03A2E; background: transparent;">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <p  style="color:#B03A2E;"> Nombre de la carrera </p>
                  </button>
                </h5>
              </div>
              <!--Datos de los corredores-->
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="card-body" style="background-color: #0000;">
                    <div class="row">
                      <div class="col-md-12 table-responsive"> 
                        <table id="listarcarrera" class="table">
                          <thead>  
                            <tr>
                              <th >N◦</th>
                              <th >corredor</th>
                              <th>         </th>
                            </tr>
                          </thead>
                            <tbody>    
                                <tr>
                                  <td> 1 </td>                              
                                  <td>Odalys</td>
                                  <td>      
                                    <!--<form action="listarCarrera" method="post">@csrf-->
                                    <!-- Tiempo-->  
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#exampleModal"class="btn btn-outline-info btn-sm">
                                        Datos
                                      </button>
                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Resultados</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              Ingrese los datos del Corredor "nombreCorredor" en la carrera "Nom_carrera"
                                              <div class="form-group">
                                                <div class="col-md-4">
                                                  <i class="fa fa-clock-o" aria-hidden="true"></i><input type="text" class="form-control hora" id="hora" name="hora" placeholder="00:00" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}" required="La hora debe tener el formato 00:00 (01:00 por ejemplo)." value="">             
                                                </div>
                                                <div class="col-md-4">
                                                  <input type="text" class="form-control" id="vueltas" name="vueltas" pattern='[0-9]{3,30}' title="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="Vueltas" required="El valor sólo puede tener caracteres numéricos">
                                                </div>
                                                <div class="col-md-4">
                                                  <input type="text" class="form-control" id="posicion" name="posicion" pattern='[0-9]{3,30}' title="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="Posicion" required="El valor sólo puede tener caracteres numéricos">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-success" >Guardar</button>
                                              <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
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
      </div> 
    </div>
  </div>
</section>
@endsection