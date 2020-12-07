@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<br>
<section class="section" style="background-color: white;">
    <div class="container" align="center">
        <div class="col-md-10">
          @if(session()->has('data'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('data')['mensaje']}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>    
          @endif
            <div class="card" style="border-color:#B03A2E;">
                <div class="card-header" style="height:50px; background-color: #B03A2E;">
                    <a style="color: white;">Lista de Alimentos</a>
                </div>
                <div class="card-body"><br>
                    <div class="row">
                        <div class="col-md-1"></div>
                            <div class="col-md-10">
                              <div class="accordion" id="accordionExample">
                                <div class="card">
                                  <div class="card-header" id="headingOne" style="background-color: white;">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color:black;">
                                        <img src="img/leche.svg" height="25" width="25"> Leche y derivados
                                      </button>
                                    </h2>
                                  </div>

                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 table-responsive">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>N°</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($leches as $clave => $leche)
                                                <tr>
                                                  <td>{{ $clave + 1}}</td>
                                                  <td>{{$leche->nombre}}</td>
                                                  <td>
                                                    <!--Modificar-->
                                                    <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarL_{{$leche->id}}">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal modificar -->
                                                    <div class="modal fade" id="modificarL_{{$leche->id}}" tabindex="-1" role="dialog" aria-labelledby="modificarL_{{$leche->id}}" aria-hidden="true"> 
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modificarL_{{$leche->id}}">Leche y Derivados</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                            <!-- acción del botón  -->
                                                              <div class="modal-body">
                                                                <div class="card-body">
                                                                  <div class="col-md-12">
                                                                    <form action="modificarAlimento" method="post" enctype="multipart/form-data" >@csrf
                                                                      <input type="hidden" name="id" value="{{$leche->id}}">
                                                                      <input type="hidden" name="alimento" value="1">
                                                                          <div class="row"> 
                                                                            <div class="col-md-12">    
                                                                              <div class="form-group">
                                                                                <label><img src="img/leche.svg" height="25" width="25"> Nombre:</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $leche->nombre}}" required="required">
                                                                              </div>  
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
                                                    <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminarL_{{$leche->id}}">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarL_{{$leche->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarLModal_{{$leche->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarLModal_{{$leche->id}}">Eliminar...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!-- acción del botón  -->
                                                            <form action="eliminarAlimento" method="post" enctype="multipart/form-data">@csrf
                                                              <input type="hidden" name="id" value="{{$leche->id}}">
                                                              <input type="hidden" name="alimento" value="1">
                                                              <div class="modal-body">
                                                                <h4> ¿Usted está seguro que desea eliminar el alimento "<b>{{$leche->nombre}}</b>" ?</h4>
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
                                               @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--CARNES PESCADO Y HUEVOS -->
                                <div class="card">
                                  <div class="card-header" id="headingTwo" style="background-color: white;">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color:black;">
                                        <img src="img/carne.png" height="25" width="25"> Carnes, pescados y huevos
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 table-responsive">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>N°</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($carnes as $clave => $carne)
                                                <tr>
                                                  <td>{{ $clave + 1}}</td>
                                                  <td>{{$carne->nombre}}</td>
                                                  <td>
                                                    <!--Modificar-->
                                                    <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarC_{{$carne->id}}">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <!-- Modal modificar -->
                                                    <div class="modal fade" id="modificarC_{{$carne->id}}" tabindex="-1" role="dialog" aria-labelledby="modificarC_{{$carne->id}}" aria-hidden="true"> 
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modificarC_{{$carne->id}}">Carnes, pescados y huevos</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                            <!-- acción del botón  -->
                                                              <div class="modal-body">
                                                                <div class="card-body">
                                                                  <div class="col-md-12">
                                                                    <form action="modificarAlimento" method="post" enctype="multipart/form-data" >@csrf
                                                                      <input type="hidden" name="id" value="{{$carne->id}}">
                                                                      <input type="hidden" name="alimento" value="2">
                                                                          <div class="row"> 
                                                                            <div class="col-md-12">    
                                                                              <div class="form-group">
                                                                                <label><img src="img/carne.png" height="25" width="25"> Nombre:</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $carne->nombre}}" required="required">
                                                                              </div>  
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
                                                    <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminarC_{{$carne->id}}">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarC_{{$carne->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarCModal_{{$carne->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarCModal_{{$carne->id}}">Eliminar...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!-- acción del botón  -->
                                                            <form action="eliminarAlimento" method="post" enctype="multipart/form-data">@csrf
                                                              <input type="hidden" name="id" value="{{$carne->id}}">
                                                              <input type="hidden" name="alimento" value="2">
                                                              <div class="modal-body">
                                                                <h4> ¿Usted está seguro que desea eliminar el alimento "<b>{{$carne->nombre}}</b>" ?</h4>
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
                                               @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--LEGUMBRES Y FRUTOS SECOS -->
                                <div class="card">
                                  <div class="card-header" id="headingThree" style="background-color: white;">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color:black;">
                                        <img src="img/frutos_secos.svg" height="25" width="25"> Legumbres y frutos secos
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 table-responsive">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>N°</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($legumbres as $clave => $legumbre)
                                                <tr>
                                                  <td>{{ $clave + 1}}</td>
                                                  <td>{{$legumbre->nombre}}</td>
                                                  <td>
                                                    <!--Modificar-->
                                                    <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarLe_{{$legumbre->id}}">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <!-- Modal modificar -->
                                                    <div class="modal fade" id="modificarLe_{{$legumbre->id}}" tabindex="-1" role="dialog" aria-labelledby="modificarLe_{{$legumbre->id}}" aria-hidden="true"> 
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modificarLe_{{$legumbre->id}}">Legumbres y frutos secos</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                            <!-- acción del botón  -->
                                                              <div class="modal-body">
                                                                <div class="card-body">
                                                                  <div class="col-md-12">
                                                                    <form action="modificarAlimento" method="post" enctype="multipart/form-data" >@csrf
                                                                      <input type="hidden" name="id" value="{{$legumbre->id}}">
                                                                      <input type="hidden" name="alimento" value="3">
                                                                          <div class="row"> 
                                                                            <div class="col-md-12">    
                                                                              <div class="form-group">
                                                                                <label><img src="img/frutos_secos.svg" height="25" width="25"> Nombre:</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $legumbre->nombre}}" required="required">
                                                                              </div>  
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
                                                    <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminarLe_{{$legumbre->id}}">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarLe_{{$legumbre->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarLeModal_{{$legumbre->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarLeModal_{{$legumbre->id}}">Eliminar...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!-- acción del botón  -->
                                                            <form action="eliminarAlimento" method="post" enctype="multipart/form-data">@csrf
                                                              <input type="hidden" name="id" value="{{$legumbre->id}}">
                                                              <input type="hidden" name="alimento" value="3">
                                                              <div class="modal-body">
                                                                <h4> ¿Usted está seguro que desea eliminar el alimento "<b>{{$legumbre->nombre}}</b>" ?</h4>
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
                                               @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- HORTALIZAS -->
                                <div class="card">
                                  <div class="card-header" id="headingFour" style="background-color: white;">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color:black;">
                                        <img src="img/hortaliza.png" height="25" width="25"> Hortalizas
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 table-responsive">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>N°</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($hortalizas as $clave => $hortaliza)
                                                <tr>
                                                  <td>{{ $clave + 1}}</td>
                                                  <td>{{$hortaliza->nombre}}</td>
                                                  <td>
                                                    <!--Modificar-->
                                                    <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarH_{{$hortaliza->id}}">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <!-- Modal modificar -->
                                                    <div class="modal fade" id="modificarH_{{$hortaliza->id}}" tabindex="-1" role="dialog" aria-labelledby="modificarH_{{$hortaliza->id}}" aria-hidden="true"> 
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modificarH_{{$hortaliza->id}}">Hortalizas</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                            <!-- acción del botón  -->
                                                              <div class="modal-body">
                                                                <div class="card-body">
                                                                  <div class="col-md-12">
                                                                    <form action="modificarAlimento" method="post" enctype="multipart/form-data" >@csrf
                                                                      <input type="hidden" name="id" value="{{$hortaliza->id}}">
                                                                      <input type="hidden" name="alimento" value="4">
                                                                          <div class="row"> 
                                                                            <div class="col-md-12">    
                                                                              <div class="form-group">
                                                                                <label><img src="img/hortaliza.png" height="25" width="25"> Nombre:</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $hortaliza->nombre}}" required="required">
                                                                              </div>  
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
                                                    <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminarH_{{$hortaliza->id}}">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarH_{{$hortaliza->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarHModal_{{$hortaliza->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarHModal_{{$hortaliza->id}}">Eliminar...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!-- acción del botón  -->
                                                            <form action="eliminarAlimento" method="post" enctype="multipart/form-data">@csrf
                                                              <input type="hidden" name="id" value="{{$hortaliza->id}}">
                                                              <input type="hidden" name="alimento" value="4">
                                                              <div class="modal-body">
                                                                <h4> ¿Usted está seguro que desea eliminar el alimento "<b>{{$hortaliza->nombre}}</b>" ?</h4>
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
                                               @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- FRUTAS -->
                                <div class="card">
                                  <div class="card-header" id="headingFive" style="background-color: white;">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color:black;">
                                        <img src="img/fruta.png" height="25" width="25"> Frutas
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 table-responsive">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>N°</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($frutas as $clave => $fruta)
                                                <tr>
                                                  <td>{{ $clave + 1}}</td>
                                                  <td>{{$fruta->nombre}}</td>
                                                  <td>
                                                    <!--Modificar-->
                                                    <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarF_{{$fruta->id}}">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <!-- Modal modificar -->
                                                    <div class="modal fade" id="modificarF_{{$fruta->id}}" tabindex="-1" role="dialog" aria-labelledby="modificarF_{{$fruta->id}}" aria-hidden="true"> 
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modificarF_{{$fruta->id}}">Frutas</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                            <!-- acción del botón  -->
                                                              <div class="modal-body">
                                                                <div class="card-body">
                                                                  <div class="col-md-12">
                                                                    <form action="modificarAlimento" method="post" enctype="multipart/form-data" >@csrf
                                                                      <input type="hidden" name="id" value="{{$fruta->id}}">
                                                                      <input type="hidden" name="alimento" value="5">
                                                                          <div class="row"> 
                                                                            <div class="col-md-12">    
                                                                              <div class="form-group">
                                                                                <label><img src="img/fruta.png" height="25" width="25"> Nombre:</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $fruta->nombre}}" required="required">
                                                                              </div>  
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
                                                    <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminarF_{{$fruta->id}}">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarF_{{$fruta->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarFModal_{{$fruta->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarFModal_{{$fruta->id}}">Eliminar...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!-- acción del botón  -->
                                                            <form action="eliminarAlimento" method="post" enctype="multipart/form-data">@csrf
                                                              <input type="hidden" name="id" value="{{$fruta->id}}">
                                                              <input type="hidden" name="alimento" value="5">
                                                              <div class="modal-body">
                                                                <h4> ¿Usted está seguro que desea eliminar el alimento "<b>{{$fruta->nombre}}</b>" ?</h4>
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
                                               @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--CEREALES-->
                                <div class="card">
                                  <div class="card-header" id="headingSix" style="background-color: white;">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="color:black;">
                                        <img src="img/cereal.png" height="25" width="25"> Cereales
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 table-responsive">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>N°</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($cereales as $clave => $cereal)
                                                <tr>
                                                  <td>{{ $clave + 1}}</td>
                                                  <td>{{$cereal->nombre}}</td>
                                                  <td>
                                                    <!--Modificar-->
                                                    <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarCe_{{$cereal->id}}">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <!-- Modal modificar -->
                                                    <div class="modal fade" id="modificarCe_{{$cereal->id}}" tabindex="-1" role="dialog" aria-labelledby="modificarCe_{{$cereal->id}}" aria-hidden="true"> 
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modificarCe_{{$cereal->id}}">Cereales</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                            <!-- acción del botón  -->
                                                              <div class="modal-body">
                                                                <div class="card-body">
                                                                  <div class="col-md-12">
                                                                    <form action="modificarAlimento" method="post" enctype="multipart/form-data" >@csrf
                                                                      <input type="hidden" name="id" value="{{$cereal->id}}">
                                                                      <input type="hidden" name="alimento" value="6">
                                                                          <div class="row"> 
                                                                            <div class="col-md-12">    
                                                                              <div class="form-group">
                                                                                <label><img src="img/cereal.png" height="25" width="25"> Nombre:</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $cereal->nombre}}" required="required">
                                                                              </div>  
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
                                                    <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminarCe_{{$cereal->id}}">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarCe_{{$cereal->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarCeModal_{{$cereal->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarCeModal_{{$cereal->id}}">Eliminar...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!-- acción del botón  -->
                                                            <form action="eliminarAlimento" method="post" enctype="multipart/form-data">@csrf
                                                              <input type="hidden" name="id" value="{{$leche->id}}">
                                                              <input type="hidden" name="alimento" value="6">
                                                              <div class="modal-body">
                                                                <h4> ¿Usted está seguro que desea eliminar el alimento "<b>{{$cereal->nombre}}</b>" ?</h4>
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
                                               @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--ACEITES Y MANTECA -->
                                <div class="card">
                                  <div class="card-header" id="headingSeven" style="background-color: white;">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="color:black;">
                                        <img src="img/aceite.png" height="25" width="25"> Manteca y aceites
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 table-responsive">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th>N°</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($aceites as $clave => $aceite)
                                                <tr>
                                                  <td>{{ $clave + 1}}</td>
                                                  <td>{{$aceite->nombre}}</td>
                                                  <td>
                                                    <!--Modificar-->
                                                    <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarA_{{$aceite->id}}">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <!-- Modal modificar -->
                                                    <div class="modal fade" id="modificarA_{{$aceite->id}}" tabindex="-1" role="dialog" aria-labelledby="modificarA_{{$aceite->id}}" aria-hidden="true"> 
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modificarA_{{$aceite->id}}">Manteca y Aceites</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                            <!-- acción del botón  -->
                                                              <div class="modal-body">
                                                                <div class="card-body">
                                                                  <div class="col-md-12">
                                                                    <form action="modificarAlimento" method="post" enctype="multipart/form-data" >@csrf
                                                                      <input type="hidden" name="id" value="{{$aceite->id}}">
                                                                      <input type="hidden" name="alimento" value="7">
                                                                          <div class="row"> 
                                                                            <div class="col-md-12">    
                                                                              <div class="form-group">
                                                                                <label><img src="img/aceite.png" height="25" width="25"> Nombre:</label>
                                                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $aceite->nombre}}" required="required">
                                                                              </div>  
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
                                                    <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminarA_{{$aceite->id}}">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarA_{{$aceite->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarAModal_{{$aceite->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarAModal_{{$aceite->id}}">Eliminar...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!-- acción del botón  -->
                                                            <form action="eliminarAlimento" method="post" enctype="multipart/form-data">@csrf
                                                              <input type="hidden" name="id" value="{{$aceite->id}}">
                                                              <input type="hidden" name="alimento" value="7">
                                                              <div class="modal-body">
                                                                <h4> ¿Usted está seguro que desea eliminar el alimento "<b>{{$aceite->nombre}}</b>" ?</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

 
 