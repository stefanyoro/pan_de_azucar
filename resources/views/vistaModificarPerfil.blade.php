@extends('layouts.app')
 
@section('content')

    <!-- END slider -->
   
    <section class="section">
    	<div class="container" style="text-align: center;">
    		
	    	<div class="">
	    		<div class="row">
		    		<div class="col-md-1"></div>
			    	<div class="col-md-10">
			    		@if(session()->has('data'))
    						<div class="alert alert-success" role="alert">
    							{{session('data')['mensaje']}}
    						</div>		
    					@endif
				    	<div class="card" align="center" style="border-color:#B03A2E; ">
				    		<div class="card-header" align="center" style="background-color: #B03A2E;">
						    	<a style="color: white;">Modificar perfil</a>
						  	</div> 
					  		<div class="card-body" align="center">
					    		<div class="">
							    	<form action="actualizarPerfil" method="post">@csrf
							    		<input type="hidden" name="id" value="{{Auth::user()->id}}">
							    		
							    		
							    		<div class="row">
											<div class="col-md-4"></div>
												<div class="col-md-6">
													<div class="form-group">
														<p for="exampleFormControlFile1" style="text-align: left;">
															<svg class="bi bi-image-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		 														<path fill-rule="evenodd" d="M.002 3a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2h-12a2 2 0 01-2-2V3zm1 9l2.646-2.354a.5.5 0 01.63-.062l2.66 1.773 3.71-3.71a.5.5 0 01.577-.094L15.002 9.5V13a1 1 0 01-1 1h-12a1 1 0 01-1-1v-1zm5-6.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" clip-rule="evenodd"/>
															</svg>
															Foto de perfil:</p>
															<input type="file" class="form-control-file" id="exampleFormControlFile1">
													</div>
												</div>
											</div><br>
							    		<div class="row">
							                   	<div class="col-md-4">
							                    	<p style="text-align: left;">Nacionalidad:</p>
							                    	<div class="form-group">
							    						<select class="form-control" id="nacionalidad" name="nacionalidad">
														    <option selected>{{Auth::user()->persona->nacionalidad}}</option>
														    @if(Auth::user()->persona->nacionalidad=='Venezolano')
														    	<option value="Extranjero">Extranjero</option>
														    @endif
														    @if(Auth::user()->persona->nacionalidad =='Extranjero')
														    	<option value="Venezolano"></option>
														    @endif
														    
														</select>
						  							</div>
							                    </div>  
							                    <div class="col-md-4">
							                    	<p style="text-align: left;">Documento:</p>
							                       <div class="form-group">
							    						<select class="form-control" id="tipo_doc" name="tipo_doc" data-pattern-error="Selecciona una opción.">
														    <option selected>{{Auth::user()->persona->tipo_doc}}</option>
														   @if(Auth::user()->persona->tipo_doc=='Cedula')
														    	<option value="Pasaporte">Pasaporte</option>
														    @endif
														   @if(Auth::user()->persona->tipo_doc=='Pasaporte')
														    	<option value="Cedula">Cedula</option>
														    @endif
														 
														</select>
						  							</div>
							                    </div>

							                    <div class="col-md-4">
							                    	<p style="text-align: left;">Número de documento:</p>
							                    	<input type="text" class="form-control" id="numero_doc" name="numero_doc" minlength="6" maxlength="8" pattern="[0-9]{6,8}" required="required" title="Sólo números de 6 a 8 dígitos." placeholder="Nº documento" value="{{Auth::user()->persona->numero_doc}}">
							                    </div>
							                </div>
			  								<div class="row">
							                    <div class="col-md-4">
							                    	<p style="text-align: left;">Nombre:</p>
							                    	<input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos." minlength="3" maxlength="30" required="required" placeholder="Nombre" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos." value="{{Auth::user()->persona->nombre}}">
							                    </div> 
							                    <div class="col-md-4">
							                    	<p style="text-align: left;">Apellido:</p>
							                        <input type="text" class="form-control" id="apellido" name="apellido" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos." minlength="5" maxlength="30" required="required" placeholder="Apellido" data-pattern-error="El apellido sólo puede tener caracteres alfabéticos." value="{{Auth::user()->persona->apellido}}"> 
							                    </div>
							                   <div class="col-md-4"> 
							                    	<p style="text-align: left;">Sexo:</p>
							                      	<div class="form-group">
							    						<select class="form-control" id="sexo" name="sexo" required="required">
														    <option selected>{{Auth::user()->persona->sexo}}</option>
														   	@if(Auth::user()->persona->sexo=='M')
														    	<option value="F">F</option>
														    @endif
														    @if(Auth::user()->persona->sexo=='F')
														   		<option value="M">M</option>
														   	@endif
														</select>
						  							</div>
							                    </div> 
							                </div>

							                <div class="row" style="margin-top: 15px;">
							                    <div class="col-md-4"> 
							                    	<div class="form-group">
							                      		<p style="text-align: left;">Fecha de nacimiento:</p>
							    							<input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="F Nacimiento" max="2020-01-02" title="El formato de la fecha de nacimiento debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)." value="{{Auth::user()->persona->fecha_nac}}">								
						  							</div>
						  						</div>

						  						<div class="col-md-4"> 
							                    	<p style="text-align: left;">Correo:</p>
							                    	<input type="email" class="form-control" id="correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="Correo" required="required" value="{{Auth::user()->email}}">
							                    </div>

							                    <div class="col-md-4">
							                    	<p style="text-align: left;">Dirección:</p>
							                      	<input type="text" class="form-control" id="direccion" name="direccion" required="required" placeholder="Dirección" value="{{Auth::user()->persona->direccion}}">
							                    </div> 

							                </div> 

							                     @if(Auth::user()->rol == '3')
							                  <div class="col-md-6">
							                  	<p style="text-align: left;">Grado de Instrucción:</p>
							                  	<div class="form-group">
						    						<select class="form-control" id="grado_Instrucc" name="grado_Instrucc">
													    <option selected>{{Auth::user()->persona->nutricionista->grado_Instrucc}}</option>
													    @if(Auth::user()->persona->nutricionista->grado_Instrucc == 'Tecnico Superior')
														    <option value="Primaria">Primaria</option>
														    <option value="Bachiller">Bachiller</option>
														    <option value="Ingeniero">Ingeniero</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													    @if(Auth::user()->persona->nutricionista->grado_Instrucc == 'Primaria')
														    <option value="Bachiller">Bachiller</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Ingeniero">Ingeniero</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													    @if(Auth::user()->persona->nutricionista->grado_Instrucc == 'Bachiller')
														    <option value="Primaria">Primaria</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Ingeniero">Ingeniero</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													    @if(Auth::user()->persona->nutricionista->grado_Instrucc == 'Ingeniero')
														    <option value="Primaria">Primaria</option>
														    <option value="Bachiller">Bachiller</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													     @if(Auth::user()->persona->nutricionista->grado_Instrucc == 'Licenciado')
														    <option value="Primaria">Primaria</option>
														    <option value="Bachiller">Bachiller</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Ingeniero">Ingeniero</option>
													    @endif
													</select>
					  							</div>
							                  </div>
							                </div>

							                @endif

							                @if(Auth::user()->rol == '1')
							               
							                <div class="row">
							                	<div class="col-md-6">
							                  		<p style="text-align: left;">Especialidad:</p>
							                    		<input type="text" class="form-control" id="especialidad" name="especialidad" required="required" placeholder="Especialidad" value="{{Auth::user()->persona->administrador->especialidad}}">
							                  	</div>
							                  	<div class="col-md-6">
							                  	<p style="text-align: left;">Grado de Instrucción:</p>
							                  	<div class="form-group">
						    						<select class="form-control" id="grado_Instrucc" name="grado_Instrucc">
													    <option selected>{{Auth::user()->persona->administrador->grado_Instrucc}}</option>
													    @if(Auth::user()->persona->administrador->grado_Instrucc == 'Tecnico Superior')
														    <option value="Primaria">Primaria</option>
														    <option value="Bachiller">Bachiller</option>
														    <option value="Ingeniero">Ingeniero</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													    @if(Auth::user()->persona->administrador->grado_Instrucc == 'Primaria')
														    <option value="Bachiller">Bachiller</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Ingeniero">Ingeniero</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													    @if(Auth::user()->persona->administrador->grado_Instrucc == 'Bachiller')
														    <option value="Primaria">Primaria</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Ingeniero">Ingeniero</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													    @if(Auth::user()->persona->administrador->grado_Instrucc == 'Ingeniero')
														    <option value="Primaria">Primaria</option>
														    <option value="Bachiller">Bachiller</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Licenciado">Licenciado</option>
													    @endif
													     @if(Auth::user()->persona->administrador->grado_Instrucc == 'Licenciado')
														    <option value="Primaria">Primaria</option>
														    <option value="Bachiller">Bachiller</option>
														    <option value="Tecnico Superior">Tecnico Superior</option>
														    <option value="Ingeniero">Ingeniero</option>
													    @endif
													</select>
					  							</div>
							                  </div>
							                </div>
							                @endif


							                @if(Auth::user()->rol == '2')
							               
							                <div class="row">
							                  <div class="col-md-12">
							                  	<p style="text-align: left;">Especialidad:</p>
							                    <input type="text" class="form-control" id="especialidad" name="especialidad" required="required" placeholder="Especialidad" value="{{Auth::user()->persona->entrenador->especialidad}}">
							                  </div>
							                </div><br>
							                @endif

							                @if(Auth::user()->rol == '4')

							               	<div class="card-header" style="height:50px; background-color:#B03A2E;"> 
			  									<p style="position:center; text-align: center; color: white;">Composición Corporal:</p>
			  								</div>
			  								<br>
							               
							                <div class="row">
							                  <div class="col-md-4">
							                  	<p style="text-align: left;">Edad:</p>
							                    <input type="text" class="form-control" id="edad" name="edad" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="" placeholder="Edad" value="{{Auth::user()->corredor->edad}}">
							                  </div>
							                  <div class="col-md-4">
							                  	<p style="text-align: left;">Peso:</p>
							                    <input type="text" class="form-control" id="peso" name="peso" minlength="2" maxlength="3" pattern="[0-9]{2,3}" required="required" data-pattern-error="Debe expresarse en kg." title="El peso debe estar expresado en kg." placeholder="Peso" value="{{Auth::user()->corredor->peso}}">
							                  </div>
							                  <div class="col-md-4">
							                  	<p style="text-align: left;">Estatura:</p>
							                   <input type="text" class="form-control" id="estatura" name="estatura" minlength="2" maxlength="4" pattern="[0-9]{2,4}" data-pattern-error="Debe expresarse en kg." required="required" title="" placeholder="Estatura" value="{{Auth::user()->corredor->estatura}}">
							                  </div>
							                </div><br>
							                @endif
							               	<div class="accordion" id="accordionExample">
			 
												<div class="card">
											   		<div class="card-header" id="headingTwo" style="background-color:#B03A2E; position: right; color: white;">
												        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: white;">
													    	<svg class="bi bi-plus-square" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  												<path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
																<path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
																<path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
															</svg>
												        </button>
												    	</div>
												    	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
												      		<div class="card-body" style="position: center;">
												      			<p style="text-align: left;"><b>Datos adicionales del usuario</b></p>

														      	<div class="row">
														      		<div class="col-md-6">
														      			<p style="text-align: left;">
														      			<svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			<path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 00.5.5h9a.5.5 0 00.5-.5V7h1v6.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5zm11-11V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
																			<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/>
																		</svg>
														      			Teléfono local:</p>
										                      			<input type="text" class="form-control" name="telf_local" id="telf_local" placeholder="0212-5554488" value="{{Auth::user()->persona->telf_local}}">
										                    		</div>

										                    		<div class="col-md-6">
										                    			<p style="text-align: left;">
										                    			<svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			<path fill-rule="evenodd" d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z" clip-rule="evenodd"/>
																			<path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
																		</svg>
										                    			Teléfono celular:</p>
										                      			<input type="text" class="form-control" name="telf_celular" id="telf_celular" placeholder="0412- 5554488" value="{{Auth::user()->persona->telf_celular}}">
										                    		</div>
														      	</div><br>

														      	<div class="row">
														      		@if(Auth::user()->rol == '4')
														      		<div class="col-md-8">
														      			<p style="text-align: left;">
														      				<svg class="bi bi-people-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			  	<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
																			  	<path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
																			  	<path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
																			</svg>
														      			Grupo de ciclismo:</p>
										                      			<input type="text" class="form-control" id="grupo_ciclismo" name="grupo_ciclismo" placeholder="Grupo al que pertenece" value="{{Auth::user()->corredor->grupo_ciclismo}}">
										                    		</div>
										                    		@endif

										                    		<div class="col-md-4">
										                    			<p style="text-align: left;">
										                    			<svg class="bi bi-clipboard" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			<path fill-rule="evenodd" d="M4 1.5H3a2 2 0 00-2 2V14a2 2 0 002 2h10a2 2 0 002-2V3.5a2 2 0 00-2-2h-1v1h1a1 1 0 011 1V14a1 1 0 01-1 1H3a1 1 0 01-1-1V3.5a1 1 0 011-1h1v-1z" clip-rule="evenodd"/>
																			<path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h3a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5zm-3-1A1.5 1.5 0 005 1.5v1A1.5 1.5 0 006.5 4h3A1.5 1.5 0 0011 2.5v-1A1.5 1.5 0 009.5 0h-3z" clip-rule="evenodd"/>
																		</svg>
										                    			Tipo de Sangre:</p>
										                      			<div class="form-group">
												    						<select class="form-control" id="tipo_sangre" name="tipo_sangre">
																			    <option selected>{{Auth::user()->persona->tipo_sangre}}<option>
																			    @if(Auth::user()->persona->tipo_sangre == 'A+')
																				    <option value="A-">A-</option>
																				    <option value="B+">B+</option>
																				    <option value="B-">B-</option>
																				    <option value="AB+">AB+</option>
																				    <option value="AB+">AB-</option>
																				    <option value="O+">O+</option>
																				    <option value="O-">O-</option>
																			    @endif
																			    @if(Auth::user()->persona->tipo_sangre == 'A-')
																				    <option value="A+">A+</option>
																				    <option value="B+">B+</option>
																				    <option value="B-">B-</option>
																				    <option value="AB+">AB+</option>
																				    <option value="AB+">AB-</option>
																				    <option value="O+">O+</option>
																				    <option value="O-">O-</option>
																			    @endif
																			    @if(Auth::user()->persona->tipo_sangre == 'B+')
																				    <option value="A+">A+</option>
																				    <option value="A-">A-</option>
																				    <option value="B-">B-</option>
																				    <option value="AB+">AB+</option>
																				    <option value="AB+">AB-</option>
																				    <option value="O+">O+</option>
																				    <option value="O-">O-</option>
																			    @endif
																			    @if(Auth::user()->persona->tipo_sangre == 'B-')
																				    <option value="A+">A+</option>
																				    <option value="A-">A-</option>
																				    <option value="B+">B+</option>
																				    <option value="AB+">AB+</option>
																				    <option value="AB+">AB-</option>
																				    <option value="O+">O+</option>
																				    <option value="O-">O-</option>
																			    @endif
																			    @if(Auth::user()->persona->tipo_sangre == 'AB+')
																				    <option value="A+">A+</option>
																				    <option value="A-">A-</option>
																				    <option value="B+">B+</option>
																				    <option value="B-">B-</option>
																				    <option value="AB-">AB-</option>
																				    <option value="O+">O+</option>
																				    <option value="O-">O-</option>
																			    @endif
																			    @if(Auth::user()->persona->tipo_sangre == 'AB-')
																				    <option value="A+">A+</option>
																				    <option value="A-">A-</option>
																				    <option value="B+">B+</option>
																				    <option value="B-">B-</option>
																				    <option value="AB+">AB+</option>
																				    <option value="O+">O+</option>
																				    <option value="O-">O-</option>
																			    @endif
																			    @if(Auth::user()->persona->tipo_sangre == 'O+')
																				    <option value="A+">A+</option>
																				    <option value="A-">A-</option>
																				    <option value="B+">B+</option>
																				    <option value="B-">B-</option>
																				    <option value="AB+">AB+</option>
																				    <option value="AB-">AB-</option>
																				    <option value="O-">O-</option>
																			    @endif
																			    @if(Auth::user()->persona->tipo_sangre == 'O-')
																				    <option value="A+">A+</option>
																				    <option value="A-">A-</option>
																				    <option value="B+">B+</option>
																				    <option value="B-">B-</option>
																				    <option value="AB+">AB+</option>
																				    <option value="AB-">AB-</option>
																				    <option value="O+">O+</option>
																			    @endif
																			</select>
											  							</div>
										                    		</div>
														      	</div>
														     
												      		</div>
												    	</div>
											  		</div>
												</div>
											</div><br>

							                <div class="row">
						                    	<div class="col-md-8"></div>
						                      		<div class="col-md-4" align="center">
						                          		<input type="submit" class="btn btn-success" value="Guardar" style=" border:none; outline: none; border-radius: 20px; height: 46px; width: 200px;">
						                      		</div><br>	
						                    	</div>
						                    <br>
						                    </div>
							       	</form>
							    </div>
					       	</div>
						</div>
					</div>
				</div>
			</div>
    	</div>
	</section>
@endsection