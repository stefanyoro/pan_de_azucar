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
					        <form action="RegistrarPlanE" method="post" id="formulario">@csrf
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
												<div class="col-md-4">
						            				<input type="text" class="form-control" id="id_user" name="id_user">
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
														@foreach($usuarios as $usuario)
					        							@if($usuario->rol == '4')
															@foreach($personas as $persona)
																@if($persona->user_id == $usuario->id)
										                		<input type="radio" name="radioName" value="{{$persona->user_id}}" />{{$persona->nombre}} {{$persona->apellido}} CI. {{$persona->numero_doc}}<br />
																	@endif
																@endforeach    	
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
											<a style="color: white;">Nuevo plan de entrenamiento</a>
									</div>
				  				</div><br>

					  			<div class="row">
					  				<div class="col-md-1"></div>
					  				<div class="col-md-10">
					  					<div class="accordion" id="accordionExample">
								  			<div class="card" style="text-align: left;">
								    			<div class="card-header" id="headingOne">
								      			<h2 class="mb-0">
								        			<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								          				<i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">MTB</a>
								        			</button>
								      			</h2>
								    </div>

								    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
								      <div class="card-body">
								      	 <div class="row">
								        	<div class="col-md-12">
								        		 <p style="text-align: left;">
								        			 <i class="fa fa-calendar" aria-hidden="true"></i> Días de entrenamiento:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_mtb" name="dias_mtb[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_mtb" name="dias_mtb[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_mtb" name="dias_mtb[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_mtb" name="dias_mtb[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_mtb" name="dias_mtb[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_mtb" name="dias_mtb[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_mtb" name="dias_mtb[]" value="Domingo">
												</div>					        		
								        	</div>
								        </div><br>

								        <div class="row">
						  			   		<div class="col-md-6">
							          			<p style="text-align: left;">
							          				<i class="fa fa-clock-o" aria-hidden="true"></i> Tiempo:
							          			</p>
													<div class="form-group">
							      						<select class="form-control" id="tiempo" name="tiempo">
							        						<option selected disabled>Seleccione..</option>
							        						<option value="30 minutos">30 minutos</option>
							        						<option value="1 hora">1 hora</option>
							        						<option value="1:30 hora">1:30 hora</option>
							        						<option value="2 horas">2 horas</option>
							        						<option value="2:30 horas">2:30 horas</option>
							        						<option value="3 horas">3 horas</option>
							        						<option value="3:30 horas">3:30 horas</option>
							        						<option value="4 horas">4 horas</option>
							        						<option value="4:30 horas">4:30 horas</option>
															<option value="5 horas">5 horas</option>
													    </select>
													</div> 
											</div>
						  				 	<div class="col-md-6">
						  				 		<p style="text-align: left;">
						  				 			<i class="fa fa-bolt" aria-hidden="true"></i> Intensidad:
						  				 		</p>
						  				   		<div class="form-group">
						      						<select class="form-control" id="tipo_intensidad" name="tipo_intensidad">
						        						<option selected disabled>Seleccione..</option>
						        						<option value="Baja">Baja</option>
														<option value="Media">Media</option>
														<option value="Alta">Alta</option>
											        	<option value="Recuperativa">Recuperativa</option>
												    </select>
												</div> 
						  				 	</div>				                  
						  				</div>

						  				<div class="row">
								        	<div class="col-md-8">
								        		 <p style="text-align: left;">
								        			Cadencia:
								        		</p>
								        		<div class="form-group">
								        			<select class="form-control" id="cadencia" name="cadencia">
								        				<option selected disabled>Seleccione..</option>
								        				<option value="50 rpm - 60 rpm"> 50 rpm - 60 rpm</option>
								        				<option value="60 rpm - 70 rpm">
								        				60 rpm - 70 rpm</option>
								        				<option value="70 rpm - 80 rpm">70 rpm - 80 rpm</option>
								        				<option value="80 rpm - 90 rpm">80 rpm - 90 rpm</option>
								        				<option value="90 rpm - 100 rpm">90 rpm - 100 rpm</option>
								        				<option value="100 rpm - mas">100 rpm - más</option>
								        			</select>
								        			
								        		</div>  

								        	</div>
								        </div>
								      </div>
								    </div>
								  </div>
								  <div class="card" style="text-align: left;">
								    <div class="card-header" id="headingTwo">
								      <h2 class="mb-0">
								        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								         <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Ruta</a>
								        </button>
								      </h2>
								    </div>
								    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								      <div class="card-body">
								        <div class="row">
								        	<div class="col-md-12">
								        		<p style="text-align: left;">
								        			<i class="fa fa-calendar" aria-hidden="true"></i> Días de entrenamiento:
								        		</p>
								        		<div class="form-check form-check-inline">
												  	&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
												  	<input class="form-check-input" type="checkbox" id="dias_ruta" name="dias_ruta[]" value="Lunes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_ruta" name="dias_ruta[]" value="Martes">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_ruta" name="dias_ruta[]" value="Miercoles">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_ruta" name="dias_ruta[]" value="Jueves">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_ruta" name="dias_ruta[]" value="Viernes">
												</div>
												<div class="form-check form-check-inline">
												  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
												  <input class="form-check-input" type="checkbox" id="dias_ruta" name="dias_ruta[]" value="Sabado">
												</div>
												<div class="form-check form-check-inline">
												  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
													<input class="form-check-input" type="checkbox" id="dias_ruta" name="dias_ruta[]" value="Domingo">
												</div>					        		
								        	</div>
								        </div><br>
								        <div class="row">
						  			   		<div class="col-md-6">
						          				<p style="text-align: left;">
						          					<i class="fa fa-clock-o" aria-hidden="true"></i> Tiempo:
						          				</p>
												<div class="form-group">
						      						<select class="form-control" id="tiempo" name="tiempo">
						        						<option selected disabled>Seleccione..</option>
						        						<option value="30 minutos">30 minutos</option>
						        						<option value="1 hora">1 hora</option>
						        						<option value="1:30 hora">1:30 hora</option>
						        						<option value="2 horas">2 horas</option>
						        						<option value="2:30 horas">2:30 horas</option>
						        						<option value="3 horas">3 horas</option>
						        						<option value="3:30 horas">3:30 horas</option>
						        						<option value="4 horas">4 horas</option>
						        						<option value="4:30 horas">4:30 horas</option>
														<option value="5 horas">5 horas</option>
												    </select>
												</div> 
											</div>
						  				 	<div class="col-md-6">
						  				 		<p style="text-align: left;">
						  				 			<i class="fa fa-bolt" aria-hidden="true"></i> Intensidad:
						  				 		</p>
						  				   		<div class="form-group">
						      						<select class="form-control" id="tipo_intensidad" name="tipo_intensidad">
						        						<option selected disabled>Seleccione..</option>
						        						<option value="Baja">Baja</option>
														<option value="Media">Media</option>
														<option value="Alta">Alta</option>
											        	<option value="Recuperativa">Recuperativa</option>
												    </select>
												</div> 
						  				 	</div>
						  				</div>
						  				 	<div class="row">
								        	<div class="col-md-8">
								        		 <p style="text-align: left;">
								        			Frecuencia:
								        		</p>
								        		<div class="form-group">
								        			<select class="form-control" id="frecuencia" name="frecuencia">
								        				<option selected disabled>Seleccione..</option>
								        				<option value="Zona 1: 50%-60%">Zona 1: 50%-60%</option>
								        				<option value="Zona 2: 60%-70%">Zona 2: 60%-70%</option>
								        				<option value="Zona 3: 70%-80%">Zona 3: 70%-80%</option>
								        				<option value="Zona 4: 80%-90%">Zona 4: 80%-90%</option>
								        				<option value="Zona 5: 90%-100%">Zona 5: 90%-100%</option>
								        				
								        			</select>
								        			
								        		</div>  		
								        	</div>
								        </div>			                  
							        </div>
								      </div>
								    </div>
								  </div>
								  <div class="card" style="text-align: left;">
								    <div class="card-header" id="headingThree">
								      <h2 class="mb-0">
								        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								          <i class="fa fa-plus-circle" aria-hidden="true" style="color: black;"></i> <a style="color: black;">Gimnasio</a>
								        </button>
								      </h2>
								    </div>
								    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								    <div class="card-body">
								        
								        <div class="row">
								        	<div class="col-md-2"></div>
						  			   		<div class="col-md-8">
						          				<p style="text-align: center;">Zonas de Ejercicio:</p>
												<div class="form-group">
						      						<select class="form-control" id="zona" name="zona" onChange="mostrar(this.value);">
						        						<option selected disabled>Seleccione..</option>
						        						<option value="4">Hombros</option>
						        						<option value="5">Pecho</option>
						        						<option value="3">Espalda</option>
						        						<option value="1">Abdomen</option>
						        						<option value="2">Brazos</option>
						        						<option value="6">Piernas</option>
												    </select>
												</div> 
											</div>

										</div>
										<!-- Ejercicios - Entrenamiento --> 
										
											
											<div class="col-md-12">
												<div id="4" style="display: none;">
													<p style="text-align: left;">Ejercicios de Hombros:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
							        							<option selected disabled>Seleccione..</option>
						      								@foreach ($ejercicios as $ejercicio)
						      									@if($ejercicio->zona == '4')
							        								<option value="{{$ejercicio->id}}">{{$ejercicio->nombre}}</option>
							        							@endif
							        						@endforeach

												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="serie" name="serie" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series"data-pattern-error="El nombre sólo puede tener caracteres alfabéticos.">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Repeticiones:</p>
									                    	<input type="text" class="form-control" id="repeticiones" name="repeticiones" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº repeticiones">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Peso:</p>
									                    	<input type="text" class="form-control" id="peso" name="peso" minlength="1" maxlength="3" pattern="[0-9]{1,3}" required="required" title="Sólo números de 1 a 3 dígitos." placeholder="Peso en libras">
														</div>
													</div>
													<br>
													<div class="row">
								        				<div class="col-md-14">
								        					<p style="text-align: left;">Días de entrenamiento:</p>
											        			<div class="form-check form-check-inline">
															  		&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
															  		<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Lunes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Martes">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Miercoles">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Jueves">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Viernes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Sabado">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Domingo">
																</div>					        		
								        				</div>
								        			</div>
								        		</div>
											</div>
											
											
											<div class="col-md-12">
												<div id="5" style="display: none;">
													<p style="text-align: left;">Ejercicios de pecho:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							@foreach ($ejercicios as $ejercicio)
						      									@if($ejercicio->zona == '5')
							        								<option value="{{$ejercicio->id}}">{{$ejercicio->nombre}}</option>
							        							@endif
							        						@endforeach
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="serie" name="serie" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series"data-pattern-error="El nombre sólo puede tener caracteres alfabéticos.">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Repeticiones:</p>
									                    	<input type="text" class="form-control" id="repeticiones" name="repeticiones" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº repeticiones">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Peso:</p>
									                    	<input type="text" class="form-control" id="peso" name="peso" minlength="1" maxlength="3" pattern="[0-9]{1,3}" required="required" title="Sólo números de 1 a 3 dígitos." placeholder="Peso en libras">
														</div>
													</div>
													<br>
													<div class="row">
								        				<div class="col-md-14">
								        					<p style="text-align: left;">Días de entrenamiento:</p>
											        			<div class="form-check form-check-inline">
															  		&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
															  		<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Lunes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Martes">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Miercoles">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Jueves">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Viernes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Sabado">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Domingo">
																</div>					        		
								        				</div>
								        			</div>
								        		</div>
											</div>
											<div class="col-md-12">
												<div id="3" style="display: none;">
													<p style="text-align: left;">Ejercicios de espalda:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							@foreach ($ejercicios as $ejercicio)
						      									@if($ejercicio->zona == '3')
							        								<option value="{{$ejercicio->id}}">{{$ejercicio->nombre}}</option>
							        							@endif
							        						@endforeach
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="serie" name="serie" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Repeticiones:</p>
									                    	<input type="text" class="form-control" id="repeticiones" name="repeticiones" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº repeticiones">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Peso:</p>
									                    	<input type="text" class="form-control" id="peso" name="peso" minlength="1" maxlength="3" pattern="[0-9]{1,3}" required="required" title="Sólo números de 1 a 3 dígitos." placeholder="Peso en libras">
														</div>
													</div>
													<br>
													<div class="row">
								        				<div class="col-md-14">
								        					<p style="text-align: left;">Días de entrenamiento:</p>
											        			<div class="form-check form-check-inline">
															  		&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
															  		<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Lunes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Martes">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="Miercoles" value="Miercoles">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Jueves">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Viernes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="Sabado" value="Sabado">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Domingo">
																</div>					        		
								        				</div>
								        			</div>
								        		</div>
											</div>
											<div class="col-md-12">
												<div id="1" style="display: none;">
													<p style="text-align: left;">Ejercicios de abdomen:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							@foreach ($ejercicios as $ejercicio)
						      									@if($ejercicio->zona == '1')
							        								<option value="{{$ejercicio->id}}">{{$ejercicio->nombre}}</option>
							        							@endif
							        						@endforeach
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="serie" name="serie" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Repeticiones:</p>
									                    	<input type="text" class="form-control" id="repeticiones" name="repeticiones" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº repeticiones">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Peso:</p>
									                    	<input type="text" class="form-control" id="peso" name="peso" minlength="1" maxlength="3" pattern="[0-9]{1,3}" required="required" title="Sólo números de 1 a 3 dígitos." placeholder="Peso en libras">
														</div>
													</div>
													<br>
													<div class="row">
								        				<div class="col-md-14">
								        					<p style="text-align: left;">Días de entrenamiento:</p>
											        			<div class="form-check form-check-inline">
															  		&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
															  		<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Lunes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Martes">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Miercoles">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Jueves">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Viernes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Sabado">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Domingo">
																</div>					        		
								        				</div>
								        			</div>
								        		</div>
											</div>
											<div class="col-md-12">
												<div id="2" style="display: none;">
													<p style="text-align: left;">Ejercicios de brazos:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							@foreach ($ejercicios as $ejercicio)
						      									@if($ejercicio->zona == '2')
							        								<option value="{{$ejercicio->id}}">{{$ejercicio->nombre}}</option>
							        							@endif
							        						@endforeach
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="serie" name="serie" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Repeticiones:</p>
									                    	<input type="text" class="form-control" id="repeticiones" name="repeticiones" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº repeticiones">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Peso:</p>
									                    	<input type="text" class="form-control" id="peso" name="peso" minlength="1" maxlength="3" pattern="[0-9]{1,3}" required="required" title="Sólo números de 1 a 3 dígitos." placeholder="Peso en libras">
														</div>
													</div>
													<br>
													<div class="row">
								        				<div class="col-md-14">
								        					<p style="text-align: left;">Días de entrenamiento:</p>
											        			<div class="form-check form-check-inline">
															  		&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
															  		<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Lunes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Martes">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Miercoles">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Jueves">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Viernes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Sabado">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Domingo">
																</div>					        		
								        				</div>
								        			</div>
								        		</div>
											</div>
											<div class="col-md-12">
												<div id="6" style="display: none;">
													<p style="text-align: left;">Ejercicios de piernas:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							@foreach ($ejercicios as $ejercicio)
						      									@if($ejercicio->zona == '6')
							        								<option value="{{$ejercicio->id}}">{{$ejercicio->nombre}}</option>
							        							@endif
							        						@endforeach
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="serie" name="serie" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Repeticiones:</p>
									                    	<input type="text" class="form-control" id="repeticiones" name="repeticiones" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº repeticiones">
														</div>

														<div class="col-md-4">
															<p style="text-align: left;">Peso:</p>
									                    	<input type="text" class="form-control" id="peso" name="peso" minlength="1" maxlength="3" pattern="[0-9]{1,3}" required="required" title="Sólo números de 1 a 3 dígitos." placeholder="Peso en libras">
														</div>
													</div>
													<br>
													<div class="row">
								        				<div class="col-md-14">
								        					<p style="text-align: left;">Días de entrenamiento:</p>
											        			<div class="form-check form-check-inline">
															  		&nbsp;<label class="form-check-label" for="Lunes">Lunes &nbsp;</label>
															  		<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Lunes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Martes">Martes &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Martes">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Miercoles">Miércoles &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="Miercoles" value="Miercoles">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Jueves">Jueves &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Jueves">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Viernes">Viernes &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Viernes">
																</div>
																<div class="form-check form-check-inline">
																  <label class="form-check-label" for="Sabado">Sábado &nbsp;</label>
																  <input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Sabado">
																</div>
																<div class="form-check form-check-inline">
																  	<label class="form-check-label" for="Domingo">Domingo &nbsp;</label>
																	<input class="form-check-input" type="checkbox" id="dias" name="dias[]" value="Domingo">
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
							            <input type="submit" class="btn btn-success" value="Guardar" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;" onclick="submitform();">
							        </div>			                     		
							    </div>
					
				            </form>
			  			</div>
			</div>
		</div>
    </div>
</section>



@endsection
@section('scriptJS')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $('#obtener').click('change', function() {
        $('#id_user').val($('input[name=radioName]:checked', '#myForm').val()); 
        $('#exampleModal').modal('hide');

    });

    function submitform(){
      	
      	document.getElementById('formulario').submit();
      }

     function mostrar(id) {
            if (id == "4") {
                $("#4").show();
                $("#5").hide();
                $("#3").hide();
                $("#1").hide();
                $("#2").hide();
                $("#6").hide();
            }

            if (id == "5") {
                $("#5").show();
                $("#4").hide();
                $("#3").hide();
                $("#1").hide();
                $("#2").hide();
                $("#6").hide();
            }
             if (id == "3") {
                $("#3").show();
                $("#5").hide();
                $("#4").hide();
                $("#1").hide();
                $("#2").hide();
                $("#6").hide();
            }

             if (id == "1") {
                $("#1").show();
                $("#5").hide();
                $("#4").hide();
                $("#3").hide();
                $("#2").hide();
                $("#6").hide();
            }

             if (id == "2") {
                $("#2").show();
                $("#5").hide();
                $("#4").hide();
                $("#3").hide();
                $("#1").hide();
                $("#6").hide();
            }

            if (id == "6") {
                $("#6").show();
                $("#2").hide();
                $("#5").hide();
                $("#4").hide();
                $("#3").hide();
                $("#1").hide();
            }
        }
</script>
@endsection
 