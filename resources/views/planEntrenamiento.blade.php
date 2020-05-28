@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<section class="section" style="background-color: white;">
   
<div class="container" align="center">
    	<div class="col-md-10">
	    	<div class="card" style="border-color:black;">
	    		<div class="card-header" style="height:50px; background-color: #B03A2E;">
	    			<a style="color: white;">Datos del corredor</a>
	    		</div>
			  		<div class="card-body">
			  			<br>
			    		<div class="">
					        <form action="RegistrarPlanE" method="post">@csrf
					        	<div class="row">
					        		<div class="col-md-2"></div>
					        		<div class="col-md-8">
					        			<form action="RegistrarPlanE" method="post">
											<!-- Button trigger modal -->
						            		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
						            			Directorio
						            		</button><br><br>      
						            		<input class="form-control" type="text" name="id_user" id="id_user" disabled>
						            		<br><br>
						        		</form>
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
													<form id="myForm">
														@foreach($usuarios as $usuario)
					        							@if($usuario->rol == '4')
															@foreach($personas as $persona)
																@if($persona->user_id == $usuario->id)
										                		<input type="radio" name="radioName" value="{{$persona->user_id}}" />{{$persona->nombre}} {{$persona->apellido}} CI. {{$persona->numero_doc}}<br />
														@endif
													@endforeach    	
											    @endif
											@endforeach
								                	</form>
								                </div>
								            </div>
								        <br>
								      </div>
								      <div class="modal-footer">
								        <button id="obtener" type="button" class="btn btn-primary">Guardar</button>
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
						        						<option value="hombros">Hombros</option>
						        						<option value="pecho">Pecho</option>
						        						<option value="espalda">Espalda</option>
						        						<option value="abdomen">Abdomen</option>
						        						<option value="brazos">Brazos</option>
						        						<option value="piernas">Piernas</option>
												    </select>
												</div> 
											</div>

										</div>
										<!-- Ejercicios - Entrenamiento --> 
											<div class="col-md-12">
												<div id="hombros" style="display: none;">
													<p style="text-align: left;">Ejercicios de hombros:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							<option value="Press frontal con barra">Press frontal con barra</option>
						        							<option value="Press trasnuca con barra">Press trasnuca con barra</option>
						        							<option value="Elevacion con mancuerna">Elevacion con mancuerna</option>
						        							<option value="Elevacion frontal">Elevacion frontal</option>
						        							<option value="Remo al cuello">Remo al cuello</option>
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="series" name="series" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
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
								        		</div><br>
											</div>
											<div class="col-md-12">
												<div id="pecho" style="display: none;">
													<p style="text-align: left;">Ejercicios de pecho:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							<option value="Press de banca">Press de banca</option>
							        						<option value="Apertura con mancuerna">Apertura con mancuerna</option>
							        						<option value="Pull over con barra">Pull over con barra</option>
							        						<option value="Flexiones de pecho">Flexiones de pecho</option>
							        						<option value="Cruce con poleas">Cruce con poleas</option>
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="series" name="series" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
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
								        		</div><br>
											</div>
											<div class="col-md-12">
												<div id="espalda" style="display: none;">
													<p style="text-align: left;">Ejercicios de espalda:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							<option value="Polea al pecho">Polea al pecho</option>
							        						<option value="Polea trasnuca">Polea trasnuca</option>
							        						<option value="Remo con mancuerna">Remo con mancuerna</option>
							        						<option value="Dominadas con barra">Dominadas con barra</option>
							        						<option value="Remo en maquina">Remo en maquina</option>
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="series" name="series" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
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
								        		</div><br>
											</div>
											<div class="col-md-12">
												<div id="abdomen" style="display: none;">
													<p style="text-align: left;">Ejercicios de abdomen:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							<option value="Curl abdominal">Curl abdominal</option>
							        						<option value="Flexion de piernas">Flexion de piernas</option>
							        						<option value="Twist con peso">Twist con peso</option>
							        						<option value="Elevacion de tronco">Elevacion de tronco</option>
							        						<option value="Bicicleta en el aire">Bicicleta en el aire</option>
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="series" name="series" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
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
								        		</div><br>
											</div>
											<div class="col-md-12">
												<div id="brazos" style="display: none;">
													<p style="text-align: left;">Ejercicios de brazos:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							<option value="Curl de biceps">Curl de biceps</option>
							        						<option value="Curl de biceps martillo">Curl de biceps martillo</option>
							        						<option value="Press frances">Press frances</option>
							        						<option value="Extension de triceps mancuerna">Extension de triceps mancuerna</option>
							        						<option value="Extension de triceps polea">Extension de triceps polea</option>
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="series" name="series" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
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
								        		</div><br>
											</div>
											<div class="col-md-12">
												<div id="piernas" style="display: none;">
													<p style="text-align: left;">Ejercicios de piernas:</p>
													<div class="form-group">
						      							<select class="form-control" id="ejercicio" name="ejercicio">
						        							<option selected disabled>Seleccione..</option>
						        							<option value="Sentadillas">Sentadillas</option>
							        						<option value="Curl de piernas">Curl de piernas</option>
							        						<option value="Gemelos en maquina">Gemelos en maquina</option>
							        						<option value="Prensa">Prensa</option>
							        						<option value="Extensiones">Extensiones</option>
												    	</select>
													</div> 
													<div class="row">
														<div class="col-md-4">
															<p style="text-align: left;">Series:</p>
									                    	<input type="text" class="form-control" id="series" name="series" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="Sólo números de 1 a 2 dígitos." placeholder="Nº series">
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
								        		</div><br>
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

     function mostrar(id) {
            if (id == "hombros") {
                $("#hombros").show();
                $("#pecho").hide();
                $("#espalda").hide();
                $("#abdomen").hide();
                $("#brazos").hide();
                $("#piernas").hide();
            }

            if (id == "pecho") {
                $("#pecho").show();
                $("#hombros").hide();
                $("#espalda").hide();
                $("#abdomen").hide();
                $("#brazos").hide();
                $("#piernas").hide();
            }
             if (id == "espalda") {
                $("#espalda").show();
                $("#pecho").hide();
                $("#hombros").hide();
                $("#abdomen").hide();
                $("#brazos").hide();
                $("#piernas").hide();
            }

             if (id == "abdomen") {
                $("#abdomen").show();
                $("#pecho").hide();
                $("#hombros").hide();
                $("#espalda").hide();
                $("#brazos").hide();
                $("#piernas").hide();
            }

             if (id == "brazos") {
                $("#brazos").show();
                $("#pecho").hide();
                $("#hombros").hide();
                $("#espalda").hide();
                $("#abdomen").hide();
                $("#piernas").hide();
            }

            if (id == "piernas") {
                $("#piernas").show();
                $("#brazos").hide();
                $("#pecho").hide();
                $("#hombros").hide();
                $("#espalda").hide();
                $("#abdomen").hide();
            }
        }
</script>
@endsection
 