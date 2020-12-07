@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

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
	    			<a style="color: white;">Datos del corredor</a>
	    		</div>
			  		<div class="card-body">
			  			<br>
			    		<div class="">
					        <form action="registro_planAlimenticio" method="post" id="formulario">@csrf
					        	<div class="row">
					        		<div class="col-md-2"></div>
					        		<div class="col-md-8">
					        			
											<!-- Button trigger modal -->
											<div class="row">
												<div class="col-md-10"></div>
												<div class="col-md-2">
						            				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
						            					Directorio
						            				</button>      
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-2">
						            				<input type="text" class="form-control" id="id_user" name="id_user" hidden="hidden">
												</div>
												
											</div>
						        		
					        		</div>
					        	</div><br>
					        	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								    <div class="modal-content">
								    	<div class="modal-header">
								        	<h5 class="modal-title" id="exampleModalLabel">Lista de Corredores</h5>
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          		<span aria-hidden="true">&times;</span>
								        	</button>
								      	</div>
								      	<div class="modal-body" style="text-align: left;">
								        <br>
								            <div class="row">
								            	<div class="col-md-12">
													<div id="myForm">
														@foreach ($usuarios as $usuario)
													    	@if ($usuario->rol == 4)
													    		<input type="radio" name="radioName" value="{{$usuario->persona->user_id}}" /> {{$usuario->persona->nombre}} {{$usuario->persona->apellido}} CI. {{$usuario->persona->numero_doc}}
													    		<br>
													    	@endif
												    	@endforeach
								                	</div>
								                </div>
								            </div>
								        <br>
								      </div>
								      <div class="modal-footer">
								        <button id="obtener" type="button" class="btn btn-success">Guardar</button>
								      </div>
								    </div>
								  </div>
								</div>
								</div>      
								                     
								<div class="accordion" id="accordionExample">
					                <div class="card-header" style="height:50px; background-color:#B03A2E;"> 
											<a style="color: white;">Nuevo plan de alimenticio</a>
									</div>
				  				</div><br>
				  				<div class="row">
				  					<div class="col-md-6">
				  						<p style="text-align: left;">Nombre del Plan:</p>
						                	<input type="text" class="form-control" id="nombre" name="nombre" title="Nombre del plan." placeholder="Ej. Plan para ganar masa muscular." required>
				  					</div>
				  					<div class="col-md-6">
				  					<p style="text-align: left;">Fecha de creación:</p>
				                      <div class="form-group">
				    					<input type="date" class="form-control disablecopypaste" name="fecha" placeholder="fecha" min="<?php echo date('Y-m-d'); ?>"  required="El formato debe ser: D-M-A." pattern="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo).">						
			  							</div>
				  					</div>
				  				</div><br>
				  				<div class="row">
				  					<div class="col-md-12">
				  						<p style="text-align: left;">Descripción del plan:</p>
						                	<textarea class="form-control w-100" name="descripcion" id="descripcion" cols="30" rows="5" onfocus="this.placeholder = ''" onblur="this.placeholder = '¡Escribe las especificaciones del plan!'" placeholder="¡Escribe las especificaciones del plan!" data-pattern-error="Debe completar este campo" required="required" minlength="11" maxlength="655"></textarea>
				  					</div>
				  				</div><br>
					  			
					  			<p><b>Selección de alimentos</b></p>

					  			<div class="row">
					  				<div class="col-md-12">
					  					<div class="accordion" id="accordionExample">
										  <div class="card">
										    <div class="card-header" id="headingOne" style="background-color: white;">
										      <h2 class="mb-0">
										        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color:black;">
										        <img src="img/leche.svg" height="25" width="25"> Leche y derivados
										        </button>
										      </h2>
										    </div>

										    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
										      <div class="card-body">
										        <div class="row">
										        	<div class="col-md-4">
								  				 		<p style="text-align: left;">
								  				 			<img src="img/leche.svg" height="15" width="15">Tipos de leches:
								  				 		</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="id_leche" name="id_leche">
								        						<option selected disabled>Seleccione..</option>
								        						@foreach ($leches as $leche)
								        							<option value="{{$leche->id}}">{{$leche->nombre}}</option>
								        						@endforeach
																
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-4">
					                                    <p style="text-align: left;"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Porción:</p>
					                                    <input class="form-control" type="number" min="1" max="100" id="porcion_leche" name="porcion_leche" placeholder="Porcion">
					                                </div>
					                                <div class="col-md-4">
								  				 		<p style="text-align: left;"><i class="fa fa-balance-scale" aria-hidden="true"></i> Equivalente:</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="equivalente_leche" name="equivalente_leche">
								        						<option selected disabled>Seleccione..</option>
								        						<option value="Cucharadas">Cucharadas</option>
								        						<option value="Cucharaditas">Cucharaditas</option>
								        						<option value="Tazas">Tazas</option>
								        						<option value="Unidad">Unidad</option>
								        						<option value="Unidades">Unidades</option>
								        						<option value="Ración">Ración</option>
																<option value="Vasos">Vasos</option>
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de consumo:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_leche" name="dias_leche[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_leche" name="dias_leche[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_leche" name="dias_leche[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_leche" name="dias_leche[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_leche" name="dias_leche[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_leche" name="dias_leche[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_leche" name="dias_leche[]" value="Domingo">
												</div>					        		
								        	</div>
										      </div>
										    </div>
										  </div>
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
										        	<div class="col-md-4">
								  				 		<p style="text-align: left;">
								  				 			<img src="img/carne.png" height="15" width="15"> Tipos de carnes:
								  				 		</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="id_carne" name="id_carne">
								        						<option selected disabled>Seleccione..</option>
								        						@foreach ($carnes as $carne)
								        							<option value="{{$carne->id}}">{{$carne->nombre}}</option>
								        						@endforeach
																
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-4">
					                                    <p style="text-align: left;"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Porción:</p>
					                                    <input class="form-control" type="number" min="1" max="100" id="porcion_carne" name="porcion_carne" placeholder="Porcion">
					                                </div>
					                                <div class="col-md-4">
								  				 		<p style="text-align: left;"><i class="fa fa-balance-scale" aria-hidden="true"></i> Equivalente:</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="equivalente_carne" name="equivalente_carne">
								        						<option selected disabled>Seleccione..</option>
								        						<option value="Cucharadas">Cucharadas</option>
								        						<option value="Cucharaditas">Cucharaditas</option>
								        						<option value="Tazas">Tazas</option>
								        						<option value="Unidad">Unidad</option>
								        						<option value="Unidades">Unidades</option>
								        						<option value="Ración">Ración</option>
																<option value="Vasos">Vasos</option>
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de consumo:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_carne" name="dias_carne[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_carne" name="dias_carne[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_carne" name="dias_carne[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_carne" name="dias_carne[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_carne" name="dias_carne[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_carne" name="dias_carne[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_carne" name="dias_carne[]" value="Domingo">
												</div>					        		
								        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
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
										        	<div class="col-md-4">
								  				 		<p style="text-align: left;">
								  				 			<img src="img/frutos_secos.svg" height="15" width="15"> Tipos de Legumbre/Frutos secos:
								  				 		</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="id_legumbres" name="id_legumbres">
								        						<option selected disabled>Seleccione..</option>
								        						@foreach ($legumbres as $legumbre)
								        							<option value="{{$legumbre->id}}">{{$legumbre->nombre}}</option>
								        						@endforeach
																
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-4">
					                                    <p style="text-align: left;"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Porción:</p>
					                                    <input class="form-control" type="number" min="1" max="100" id="porcion_legumbre" name="porcion_legumbre" placeholder="Porcion">
					                                </div>
					                                <div class="col-md-4">
								  				 		<p style="text-align: left;"><i class="fa fa-balance-scale" aria-hidden="true"></i> Equivalente:</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="equivalente_legumbre" name="equivalente_legumbre">
								        						<option selected disabled>Seleccione..</option>
								        						<option value="Cucharadas">Cucharadas</option>
								        						<option value="Cucharaditas">Cucharaditas</option>
								        						<option value="Tazas">Tazas</option>
								        						<option value="Unidad">Unidad</option>
								        						<option value="Unidades">Unidades</option>
								        						<option value="Ración">Ración</option>
																<option value="Vasos">Vasos</option>
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de consumo:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_legumbre" name="dias_legumbre[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_legumbre" name="dias_legumbre[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_legumbre" name="dias_legumbre[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_legumbre" name="dias_legumbre[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_legumbre" name="dias_legumbre[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_legumbre" name="dias_legumbre[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_legumbre" name="dias_legumbre[]" value="Domingo">
												</div>					        		
								        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
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
										        	<div class="col-md-4">
								  				 		<p style="text-align: left;">
								  				 			<img src="img/hortaliza.png" height="15" width="15"> Tipos de hortalizas:
								  				 		</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="id_hortalizas" name="id_hortalizas">
								        						<option selected disabled>Seleccione..</option>
								        						@foreach ($hortalizas as $hortaliza)
								        							<option value="{{$hortaliza->id}}">{{$hortaliza->nombre}}</option>
								        						@endforeach
																
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-4">
					                                    <p style="text-align: left;"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Porción:</p>
					                                    <input class="form-control" type="number" min="1" max="100" id="porcion_hortalizas" name="porcion_hortalizas" placeholder="Porcion">
					                                </div>
					                                <div class="col-md-4">
								  				 		<p style="text-align: left;"><i class="fa fa-balance-scale" aria-hidden="true"></i> Equivalentes:</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="equivalente_hortalizas" name="equivalente_hortalizas">
								        						<option selected disabled>Seleccione..</option>
								        						<option value="Cucharadas">Cucharadas</option>
								        						<option value="Cucharaditas">Cucharaditas</option>
								        						<option value="Tazas">Tazas</option>
								        						<option value="Unidad">Unidad</option>
								        						<option value="Unidades">Unidades</option>
								        						<option value="Ración">Ración</option>
																<option value="Vasos">Vasos</option>
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de consumo:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_hortalizas" name="dias_hortalizas[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_hortalizas" name="dias_hortalizas[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_hortalizas" name="dias_hortalizas[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_hortalizas" name="dias_hortalizas[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_hortalizas" name="dias_hortalizas[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_hortalizas" name="dias_hortalizas[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_hortalizas" name="dias_hortalizas[]" value="Domingo">
												</div>					        		
								        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
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
										        	<div class="col-md-4">
								  				 		<p style="text-align: left;">
								  				 			<img src="img/fruta.png" height="15" width="15"> Tipos de frutas:
								  				 		</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="id_fruta" name="id_fruta">
								        						<option selected disabled>Seleccione..</option>
								        						@foreach ($frutas as $fruta)
								        							<option value="{{$fruta->id}}">{{$fruta->nombre}}</option>
								        						@endforeach
																
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-4">
					                                    <p style="text-align: left;"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Porción:</p>
					                                    <input class="form-control" type="number" min="1" max="100" id="porcion_fruta" name="porcion_fruta" placeholder="Porcion">
					                                </div>
					                                <div class="col-md-4">
								  				 		<p style="text-align: left;"><i class="fa fa-balance-scale" aria-hidden="true"></i> Porción:</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="equivalente_fruta" name="equivalente_fruta">
								        						<option selected disabled>Seleccione..</option>
								        						<option value="Cucharadas">Cucharadas</option>
								        						<option value="Cucharaditas">Cucharaditas</option>
								        						<option value="Tazas">Tazas</option>
								        						<option value="Unidad">Unidad</option>
								        						<option value="Unidades">Unidades</option>
								        						<option value="Ración">Ración</option>
																<option value="Vasos">Vasos</option>
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de consumo:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_fruta" name="dias_fruta[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_fruta" name="dias_fruta[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_fruta" name="dias_fruta[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_fruta" name="dias_fruta[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_fruta" name="dias_fruta[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_fruta" name="dias_fruta[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_fruta" name="dias_fruta[]" value="Domingo">
												</div>					        		
								        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
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
										        	<div class="col-md-4">
								  				 		<p style="text-align: left;">
								  				 			<img src="img/cereal.png" height="15" width="15"> Tipos de cereales:
								  				 		</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="id_cereal" name="id_cereal">
								        						<option selected disabled>Seleccione..</option>
								        						@foreach ($cereales as $cereal)
								        							<option value="{{$cereal->id}}">{{$cereal->nombre}}</option>
								        						@endforeach
																
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-4">
					                                    <p style="text-align: left;"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Porción:</p>
					                                    <input class="form-control" type="number" min="1" max="100" id="porcion_cereal" name="porcion_cereal" placeholder="Porcion">
					                                </div>
					                                <div class="col-md-4">
								  				 		<p style="text-align: left;"><i class="fa fa-balance-scale" aria-hidden="true"></i> Equivalentes:</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="equivalente_cereal" name="equivalente_cereal">
								        						<option selected disabled>Seleccione..</option>
								        						<option value="Cucharadas">Cucharadas</option>
								        						<option value="Cucharaditas">Cucharaditas</option>
								        						<option value="Tazas">Tazas</option>
								        						<option value="Unidad">Unidad</option>
								        						<option value="Unidades">Unidades</option>
								        						<option value="Ración">Ración</option>
																<option value="Vasos">Vasos</option>
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de consumo:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_cereal" name="dias_cereal[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_cereal" name="dias_cereal[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_cereal" name="dias_cereal[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_cereal" name="dias_cereal[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_cereal" name="dias_cereal[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_cereal" name="dias_cereal[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_cereal" name="dias_cereal[]" value="Domingo">
												</div>					        		
								        	</div>
										        </div>
										      </div>
										    </div>
										  </div>
										  <div class="card">
										    <div class="card-header" id="headingSeven" style="background-color: white;">
										      <h2 class="mb-0">
										        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="color:black;">
										         <img src="img/aceite.png" height="25" width="25"> Manteca y aceites
										        </button>
										      </h2>
										    </div>
										    <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
										      <div class="card-body">
										        <div class="row">
										        	<div class="col-md-4">
								  				 		<p style="text-align: left;">
								  				 			<img src="img/aceite.png" height="15" width="15"> Tipos de aceites:
								  				 		</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="id_aceite" name="id_aceite">
								        						<option selected disabled>Seleccione..</option>
								        						@foreach ($aceites as $aceite)
								        							<option value="{{$aceite->id}}">{{$aceite->nombre}}</option>
								        						@endforeach
																
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-4">
					                                    <p style="text-align: left;"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Porción:</p>
					                                    <input class="form-control" type="number" min="1" max="100" id="porcion_aceite" name="porcion_aceite" placeholder="Porcion">
					                                </div>
					                                <div class="col-md-4">
								  				 		<p style="text-align: left;"><i class="fa fa-balance-scale" aria-hidden="true"></i> Equivalentes:</p>
								  				   		<div class="form-group">
								      						<select class="form-control" id="equivalente_aceite" name="equivalente_aceite">
								        						<option selected disabled>Seleccione..</option>
								        						<option value="Cucharadas">Cucharadas</option>
								        						<option value="Cucharaditas">Cucharaditas</option>
								        						<option value="Tazas">Tazas</option>
								        						<option value="Unidad">Unidad</option>
								        						<option value="Unidades">Unidades</option>
								        						<option value="Ración">Ración</option>
																<option value="Vasos">Vasos</option>
														    </select>
														</div> 
										        	
										        	</div>
										        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de consumo:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_aceite" name="dias_aceite[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_aceite" name="dias_aceite[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_aceite" name="dias_aceite[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_aceite" name="dias_aceite[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_aceite" name="dias_aceite[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_aceite" name="dias_aceite[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_aceite" name="dias_aceite[]" value="Domingo">
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
								<br><br>
								<div class="row">				           		
								    <div class="col-md-8"></div>                  		
							        <div class="col-md-4">
							            <input type="submit" class="btn btn-success" value="Guardar" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
							        </div>			                     		
							    </div>
					
				            </form>
				            <br>
			  			</div>
			</div>
	</div>
</div>
</section>

@endsection
@section('scriptJS')
<script>
	$('#obtener').click('change', function() {
        $('#id_user').val($('input[name=radioName]:checked', '#myForm').val()); 
        $('#exampleModal').modal('hide');

    });
</script>
@endsection