@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<br>
<section class="section" style="background-color: white;">
    <div class="container" align="center">
        <div class="col-md-10">
            <div class="card" style="border-color:#B03A2E;">
                <div class="card-header" style="height:50px; background-color: #B03A2E;">
                    <a style="color: white;">Lista de ejercicios</a>
                </div>
                <div class="card-body"><br>
                    <div class="row">
                        <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="accordion" id="accordionExample">
  <div class="card" style="text-align: left;">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Abdomen</a>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
  <div class="col-md-12 table-responsive"> 
      <table id="listaejercicio" class="table">
        <thead>  
          <tr>
            <th >N◦</th>
            <th >Nombre</th>
            <th >Ejecución</th>
            <th >           </th>
          </tr>
        </thead>
        <tbody>    
          @foreach ($ejercicios as $clave => $ejercicio)
            @if($ejercicio->zona == '1')
              @if($ejercicio->estatus == '1')
            <tr>                              
              <td>{{ $clave + 1}}</td>
              <td>{{ $ejercicio->nombre}}</td>
              <td>{{ $ejercicio->ejecucion}}</td>
              <td >
                <!-- visualizar -->
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$ejercicio->id}}">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="visualizar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$ejercicio->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <h5 class="modal-title" id="visualizarModal_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                  <!-- acción del botón  -->
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <img src="{{\Storage::url($ejercicio->img)}}" width="100%" height="50%">
                                            <br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Posición:</b> {{$ejercicio->posicion}}</div>
                                            <div class="col-md-6"><b>Ejecución: </b> {{$ejercicio->ejecucion}}</div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Respiración:</b> {{$ejercicio->respiracion}}</div>
                                            <div class="col-md-6"><b>Músculos: </b> {{$ejercicio->musculos}}</div>
                                          </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
                                
                <!--Modificar-->
                  <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar_{{$ejercicio->id}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modificar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="modificar_{{$ejercicio->id}}" aria-hidden="true"> 
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificar_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <!-- acción del botón  -->
                                <div class="modal-body">
                                  <div class="card-body">
                                    <div class="col-md-12">
                                      <form action="modificarEjercicio" method="post" enctype="multipart/form-data" >@csrf
                                        <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                            <div class="row"> 
                                            <div class="col-md-10"></div>
                                              <div class="col-md-2">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Zona:</label>
                                                    <input type="text" class="form-control" id="zona" name="zona" placeholder="" value="{{ $ejercicio->zona}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $ejercicio->nombre}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Posición:</label>
                                                    <input type="text" class="form-control" id="posicion" name="posicion" placeholder="" value="{{ $ejercicio->posicion}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Ejecución:</label>
                                                    <input type="text" class="form-control" id="ejecucion" name="ejecucion" placeholder="" value="{{ $ejercicio->ejecucion}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Respiración:</label>
                                                      <input type="text" class="form-control" id="respiracion" name="respiracion" placeholder="" value="{{ $ejercicio->respiracion}}" required="required">
                                                </div>  
                                              </div>
                                            </div> 
                                            <div class="row"> 
                                              <div class="col-md-2"></div>
                                              <div class="col-md-8">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Músculos:</label>
                                                    <input type="text" class="form-control" id="musculos" name="musculos" placeholder="" value="{{ $ejercicio->musculos}}" required="required">
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
                  <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$ejercicio->id}}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                      <!-- Modal -->
                        <div class="modal fade" id="eliminar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$ejercicio->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminarModal_{{$ejercicio->id}}">Eliminar...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- acción del botón  -->
                                <form action="eliminarEjercicio" method="post" enctype="multipart/form-data">@csrf
                                  <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                  <div class="modal-body">
                                    <h4> ¿Usted está seguro que desea eliminar el ejercicio "<b>{{$ejercicio->nombre}}</b>" ?</h4>
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
        </tbody>
      </table>
  </div> 
</div>
      </div>
    </div>
  </div>
<!-- Ejercicios de Brazos-->
  <div class="card" style="text-align: left;">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Brazos</a>
        </button>
      </h2>
    </div>

    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
  <div class="col-md-12 table-responsive"> 
      <table id="listaejercicio" class="table">
        <thead>  
          <tr>
            <th >N◦</th>
            <th >Nombre</th>
            <th >Ejecución</th>
            <th >           </th>
          </tr>
        </thead>
        <tbody>    
          @foreach ($ejercicios as $clave => $ejercicio)
            @if($ejercicio->zona == '2')
             @if($ejercicio->estatus == '1')
            <tr>                              
              <td>{{ $clave + 1}}</td>
              <td>{{ $ejercicio->nombre}}</td>
              <td>{{ $ejercicio->ejecucion}}</td>
              <td >
                <!-- visualizar -->
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$ejercicio->id}}">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="visualizar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$ejercicio->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <h5 class="modal-title" id="visualizarModal_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                  <!-- acción del botón  -->
                                    <div class="modal-body">
                                        <div class="card-body">
                                          <img src="{{\Storage::url($ejercicio->img)}}" width="100%" height="50%">
                                            <br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Posición:</b> {{$ejercicio->posicion}}</div>
                                            <div class="col-md-6"><b>Ejecución: </b> {{$ejercicio->ejecucion}}</div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Respiración:</b> {{$ejercicio->respiracion}}</div>
                                            <div class="col-md-6"><b>Músculos: </b> {{$ejercicio->musculos}}</div>
                                          </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
                                
                <!--Modificar-->
                  <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar_{{$ejercicio->id}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modificar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="modificar_{{$ejercicio->id}}" aria-hidden="true"> 
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificar_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <!-- acción del botón  -->
                                <div class="modal-body">
                                  <div class="card-body">
                                    <div class="col-md-12">
                                      <form action="modificarEjercicio" method="post" enctype="multipart/form-data" >@csrf
                                        <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                            <div class="row"> 
                                            <div class="col-md-10"></div>
                                              <div class="col-md-2">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Zona:</label>
                                                    <input type="text" class="form-control" id="zona" name="zona" placeholder="" value="{{ $ejercicio->zona}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $ejercicio->nombre}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Posición:</label>
                                                    <input type="text" class="form-control" id="posicion" name="posicion" placeholder="" value="{{ $ejercicio->posicion}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Ejecución:</label>
                                                    <input type="text" class="form-control" id="ejecucion" name="ejecucion" placeholder="" value="{{ $ejercicio->ejecucion}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Respiración:</label>
                                                      <input type="text" class="form-control" id="respiracion" name="respiracion" placeholder="" value="{{ $ejercicio->respiracion}}" required="required">
                                                </div>  
                                              </div>
                                            </div> 
                                            <div class="row"> 
                                              <div class="col-md-2"></div>
                                              <div class="col-md-8">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Músculos:</label>
                                                    <input type="text" class="form-control" id="musculos" name="musculos" placeholder="" value="{{ $ejercicio->musculos}}" required="required">
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
                  <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$ejercicio->id}}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                      <!-- Modal -->
                        <div class="modal fade" id="eliminar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$ejercicio->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminarModal_{{$ejercicio->id}}">Eliminar...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- acción del botón  -->
                                <form action="eliminarEjercicio" method="post" enctype="multipart/form-data">@csrf
                                  <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                  <div class="modal-body">
                                    <h4> ¿Usted está seguro que desea eliminar el ejercicio "<b>{{$ejercicio->nombre}}</b>" ?</h4>
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
        </tbody>
      </table>
  </div> 
</div>
      </div>
    </div>
  </div>
<!-- Ejercicios de Espalda -->
  <div class="card" style="text-align: left;">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Espalda</a>
        </button>
      </h2>
    </div>

    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
  <div class="col-md-12 table-responsive"> 
      <table id="listaejercicio" class="table">
        <thead>  
          <tr>
            <th >N◦</th>
            <th >Nombre</th>
            <th >Ejecución</th>
            <th >           </th>
          </tr>
        </thead>
        <tbody>    
          @foreach ($ejercicios as $clave => $ejercicio)
            @if($ejercicio->zona == '3')
             @if($ejercicio->estatus == '1')
            <tr>                              
              <td>{{ $clave + 1}}</td>
              <td>{{ $ejercicio->nombre}}</td>
              <td>{{ $ejercicio->ejecucion}}</td>
              <td >
                <!-- visualizar -->
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$ejercicio->id}}">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="visualizar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$ejercicio->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <h5 class="modal-title" id="visualizarModal_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                  <!-- acción del botón  -->
                                    <div class="modal-body">
                                        <div class="card-body">
                                          <img src="{{\Storage::url($ejercicio->img)}}" width="100%" height="50%">
                                            <br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Posición:</b> {{$ejercicio->posicion}}</div>
                                            <div class="col-md-6"><b>Ejecución: </b> {{$ejercicio->ejecucion}}</div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Respiración:</b> {{$ejercicio->respiracion}}</div>
                                            <div class="col-md-6"><b>Músculos: </b> {{$ejercicio->musculos}}</div>
                                          </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
                                
                <!--Modificar-->
                  <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar_{{$ejercicio->id}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modificar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="modificar_{{$ejercicio->id}}" aria-hidden="true"> 
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificar_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <!-- acción del botón  -->
                                <div class="modal-body">
                                  <div class="card-body">
                                    <div class="col-md-12">
                                      <form action="modificarEjercicio" method="post" enctype="multipart/form-data" >@csrf
                                        <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                            <div class="row"> 
                                            <div class="col-md-10"></div>
                                              <div class="col-md-2">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Zona:</label>
                                                    <input type="text" class="form-control" id="zona" name="zona" placeholder="" value="{{ $ejercicio->zona}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $ejercicio->nombre}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Posición:</label>
                                                    <input type="text" class="form-control" id="posicion" name="posicion" placeholder="" value="{{ $ejercicio->posicion}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Ejecución:</label>
                                                    <input type="text" class="form-control" id="ejecucion" name="ejecucion" placeholder="" value="{{ $ejercicio->ejecucion}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Respiración:</label>
                                                      <input type="text" class="form-control" id="respiracion" name="respiracion" placeholder="" value="{{ $ejercicio->respiracion}}" required="required">
                                                </div>  
                                              </div>
                                            </div> 
                                            <div class="row"> 
                                              <div class="col-md-2"></div>
                                              <div class="col-md-8">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Músculos:</label>
                                                    <input type="text" class="form-control" id="musculos" name="musculos" placeholder="" value="{{ $ejercicio->musculos}}" required="required">
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
                  <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$ejercicio->id}}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                      <!-- Modal -->
                        <div class="modal fade" id="eliminar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$ejercicio->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminarModal_{{$ejercicio->id}}">Eliminar...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- acción del botón  -->
                                <form action="eliminarEjercicio" method="post" enctype="multipart/form-data">@csrf
                                  <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                  <div class="modal-body">
                                    <h4> ¿Usted está seguro que desea eliminar el ejercicio "<b>{{$ejercicio->nombre}}</b>" ?</h4>
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
        </tbody>
      </table>
  </div> 
</div>
      </div>
    </div>
  </div>
<!-- Ejercicios de Hombros -->
  <div class="card" style="text-align: left;">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Hombros</a>
        </button>
      </h2>
    </div>

    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
  <div class="col-md-12 table-responsive"> 
      <table id="listaejercicio" class="table">
        <thead>  
          <tr>
            <th >N◦</th>
            <th >Nombre</th>
            <th >Ejecución</th>
            <th >           </th>
          </tr>
        </thead>
        <tbody>    
          @foreach ($ejercicios as $clave => $ejercicio)
            @if($ejercicio->zona == '4')
             @if($ejercicio->estatus == '1')
            <tr>                              
              <td>{{ $clave + 1}}</td>
              <td>{{ $ejercicio->nombre}}</td>
              <td>{{ $ejercicio->ejecucion}}</td>
              <td >
                <!-- visualizar -->
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$ejercicio->id}}">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="visualizar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$ejercicio->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <h5 class="modal-title" id="visualizarModal_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                  <!-- acción del botón  -->
                                    <div class="modal-body">
                                        <div class="card-body">
                                          <div class="row">
                                            <img src="{{\Storage::url($ejercicio->img)}}" width="100%" height="50%">
                                            <br>
                                            <div class="col-md-6"><b>Posición:</b> {{$ejercicio->posicion}}</div>
                                            <div class="col-md-6"><b>Ejecución: </b> {{$ejercicio->ejecucion}}</div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Respiración:</b> {{$ejercicio->respiracion}}</div>
                                            <div class="col-md-6"><b>Músculos: </b> {{$ejercicio->musculos}}</div>
                                          </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
                                
                 <!--Modificar-->
                  <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar_{{$ejercicio->id}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modificar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="modificar_{{$ejercicio->id}}" aria-hidden="true"> 
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificar_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <!-- acción del botón  -->
                                <div class="modal-body">
                                  <div class="card-body">
                                    <div class="col-md-12">
                                      <form action="modificarEjercicio" method="post" enctype="multipart/form-data" >@csrf
                                        <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                            <div class="row"> 
                                            <div class="col-md-10"></div>
                                              <div class="col-md-2">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Zona:</label>
                                                    <input type="text" class="form-control" id="zona" name="zona" placeholder="" value="{{ $ejercicio->zona}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $ejercicio->nombre}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Posición:</label>
                                                    <input type="text" class="form-control" id="posicion" name="posicion" placeholder="" value="{{ $ejercicio->posicion}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Ejecución:</label>
                                                    <input type="text" class="form-control" id="ejecucion" name="ejecucion" placeholder="" value="{{ $ejercicio->ejecucion}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Respiración:</label>
                                                      <input type="text" class="form-control" id="respiracion" name="respiracion" placeholder="" value="{{ $ejercicio->respiracion}}" required="required">
                                                </div>  
                                              </div>
                                            </div> 
                                            <div class="row"> 
                                              <div class="col-md-2"></div>
                                              <div class="col-md-8">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Músculos:</label>
                                                    <input type="text" class="form-control" id="musculos" name="musculos" placeholder="" value="{{ $ejercicio->musculos}}" required="required">
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
                  <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$ejercicio->id}}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                      <!-- Modal -->
                        <div class="modal fade" id="eliminar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$ejercicio->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminarModal_{{$ejercicio->id}}">Eliminar...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- acción del botón  -->
                                <form action="eliminarEjercicio" method="post" enctype="multipart/form-data">@csrf
                                  <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                  <div class="modal-body">
                                    <h4> ¿Usted está seguro que desea eliminar el ejercicio "<b>{{$ejercicio->nombre}}</b>" ?</h4>
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
        </tbody>
      </table>
  </div> 
</div>
      </div>
    </div>
  </div>
<!-- Ejercicios de Pecho -->
  <div class="card" style="text-align: left;">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Pecho</a>
        </button>
      </h2>
    </div>

    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
  <div class="col-md-12 table-responsive"> 
      <table id="listaejercicio" class="table">
        <thead>  
          <tr>
            <th >N◦</th>
            <th >Nombre</th>
            <th >Ejecución</th>
            <th >           </th>
          </tr>
        </thead>
        <tbody>    
          @foreach ($ejercicios as $clave => $ejercicio)
            @if($ejercicio->zona == '5')
             @if($ejercicio->estatus == '1')
            <tr>                              
              <td>{{ $clave + 1}}</td>
              <td>{{ $ejercicio->nombre}}</td>
              <td>{{ $ejercicio->ejecucion}}</td>
              <td >
                <!-- visualizar -->
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$ejercicio->id}}">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="visualizar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$ejercicio->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <h5 class="modal-title" id="visualizarModal_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                  <!-- acción del botón  -->
                                    <div class="modal-body">
                                        <div class="card-body">
                                          <div class="row">
                                            <img src="{{\Storage::url($ejercicio->img)}}" width="100%" height="50%">
                                            <br>
                                            <div class="col-md-6"><b>Posición:</b> {{$ejercicio->posicion}}</div>
                                            <div class="col-md-6"><b>Ejecución: </b> {{$ejercicio->ejecucion}}</div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Respiración:</b> {{$ejercicio->respiracion}}</div>
                                            <div class="col-md-6"><b>Músculos: </b> {{$ejercicio->musculos}}</div>
                                          </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
                                
                 <!--Modificar-->
                  <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar_{{$ejercicio->id}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modificar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="modificar_{{$ejercicio->id}}" aria-hidden="true"> 
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificar_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <!-- acción del botón  -->
                                <div class="modal-body">
                                  <div class="card-body">
                                    <div class="col-md-12">
                                      <form action="modificarEjercicio" method="post" enctype="multipart/form-data" >@csrf
                                        <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                            <div class="row"> 
                                            <div class="col-md-10"></div>
                                              <div class="col-md-2">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Zona:</label>
                                                    <input type="text" class="form-control" id="zona" name="zona" placeholder="" value="{{ $ejercicio->zona}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $ejercicio->nombre}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Posición:</label>
                                                    <input type="text" class="form-control" id="posicion" name="posicion" placeholder="" value="{{ $ejercicio->posicion}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Ejecución:</label>
                                                    <input type="text" class="form-control" id="ejecucion" name="ejecucion" placeholder="" value="{{ $ejercicio->ejecucion}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Respiración:</label>
                                                      <input type="text" class="form-control" id="respiracion" name="respiracion" placeholder="" value="{{ $ejercicio->respiracion}}" required="required">
                                                </div>  
                                              </div>
                                            </div> 
                                            <div class="row"> 
                                              <div class="col-md-2"></div>
                                              <div class="col-md-8">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Músculos:</label>
                                                    <input type="text" class="form-control" id="musculos" name="musculos" placeholder="" value="{{ $ejercicio->musculos}}" required="required">
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
                  <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$ejercicio->id}}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                      <!-- Modal -->
                        <div class="modal fade" id="eliminar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$ejercicio->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminarModal_{{$ejercicio->id}}">Eliminar...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- acción del botón  -->
                                <form action="eliminarEjercicio" method="post" enctype="multipart/form-data">@csrf
                                  <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                  <div class="modal-body">
                                    <h4> ¿Usted está seguro que desea eliminar el ejercicio "<b>{{$ejercicio->nombre}}</b>" ?</h4>
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
        </tbody>
      </table>
  </div> 
</div>
      </div>
    </div>
  </div>
<!-- Ejercicios de Piernas-->
  <div class="card" style="text-align: left;">
    <div class="card-header" id="headingSix">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Piernas</a>
        </button>
      </h2>
    </div>

    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
  <div class="col-md-12 table-responsive"> 
      <table id="listaejercicio" class="table">
        <thead>  
          <tr>
            <th >N◦</th>
            <th >Nombre</th>
            <th >Ejecución</th>
            <th >           </th>
          </tr>
        </thead>
        <tbody>    
          @foreach ($ejercicios as $clave => $ejercicio)
            @if($ejercicio->zona == '6')
            @if($ejercicio->estatus == '1')

            <tr>                              
              <td>{{ $clave + 1}}</td>
              <td>{{ $ejercicio->nombre}}</td>
              <td>{{ $ejercicio->ejecucion}}</td>
              <td >
                <!-- visualizar -->
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar_{{$ejercicio->id}}">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <!-- Modal -->
                      <div class="modal fade" id="visualizar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="visualizarModal_{{$ejercicio->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <h5 class="modal-title" id="visualizarModal_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                  <!-- acción del botón  -->
                                    <div class="modal-body">
                                        <div class="card-body">
                                          <div class="row">
                                            <img src="{{\Storage::url($ejercicio->img)}}" width="100%" height="50%">
                                            <br>
                                            <div class="col-md-6"><b>Posición:</b> {{$ejercicio->posicion}}</div>
                                            <div class="col-md-6"><b>Ejecución: </b> {{$ejercicio->ejecucion}}</div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-md-6"><b>Respiración:</b> {{$ejercicio->respiracion}}</div>
                                            <div class="col-md-6"><b>Músculos: </b> {{$ejercicio->musculos}}</div>
                                          </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
                                
                <!--Modificar-->
                  <button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar_{{$ejercicio->id}}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                    <!-- Modal -->
                      <div class="modal fade" id="modificar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="modificar_{{$ejercicio->id}}" aria-hidden="true"> 
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificar_{{$ejercicio->id}}">{{$ejercicio->nombre}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                              <!-- acción del botón  -->
                                <div class="modal-body">
                                  <div class="card-body">
                                    <div class="col-md-12">
                                      <form action="modificarEjercicio" method="post" enctype="multipart/form-data" >@csrf
                                        <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                            <div class="row"> 
                                            <div class="col-md-10"></div>
                                              <div class="col-md-2">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Zona:</label>
                                                    <input type="text" class="form-control" id="zona" name="zona" placeholder="" value="{{ $ejercicio->zona}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $ejercicio->nombre}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Posición:</label>
                                                    <input type="text" class="form-control" id="posicion" name="posicion" placeholder="" value="{{ $ejercicio->posicion}}" required="required">
                                                </div>  
                                              </div>
                                            </div>
                                            <div class="row"> 
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Ejecución:</label>
                                                    <input type="text" class="form-control" id="ejecucion" name="ejecucion" placeholder="" value="{{ $ejercicio->ejecucion}}" required="required">
                                                </div>  
                                              </div>
                                              <div class="col-md-6">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Respiración:</label>
                                                      <input type="text" class="form-control" id="respiracion" name="respiracion" placeholder="" value="{{ $ejercicio->respiracion}}" required="required">
                                                </div>  
                                              </div>
                                            </div> 
                                            <div class="row"> 
                                              <div class="col-md-2"></div>
                                              <div class="col-md-8">    
                                                <div class="form-group">
                                                  <label><i class="fa fa-flag-checkered" aria-hidden="true"></i> Músculos:</label>
                                                    <input type="text" class="form-control" id="musculos" name="musculos" placeholder="" value="{{ $ejercicio->musculos}}" required="required">
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
                  <button type="button" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#eliminar_{{$ejercicio->id}}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                      <!-- Modal -->
                        <div class="modal fade" id="eliminar_{{$ejercicio->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$ejercicio->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminarModal_{{$ejercicio->id}}">Eliminar...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- acción del botón  -->
                                <form action="eliminarEjercicio" method="post" enctype="multipart/form-data">@csrf
                                  <input type="hidden" name="id" value="{{$ejercicio->id}}">
                                  <div class="modal-body">
                                    <h4> ¿Usted está seguro que desea eliminar el ejercicio "<b>{{$ejercicio->nombre}}</b>" ?</h4>
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
        </tbody>
      </table>
  </div> 
</div>
      </div>
    </div>
  </div><br>
  

    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>

@endsection

 
 