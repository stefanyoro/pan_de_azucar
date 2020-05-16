@extends('layouts.app')
 
@section('content')

    <!-- END slider -->
   
    <section class="section">
    	
    <div class="container" align="center">
    	<div class="col-md-9">
    		@if(session()->has('data'))
    <div class="alert alert-success" role="alert">
    		{{session('data')['mensaje']}}
    </div>		
    @endif
	    	<div class="card" style="border-color:#B03A2E; background: transparent;">
	    		<div class="card-header" style="background-color: #B03A2E;">
			    	<a style="color: white;">Registrar nuevo usuario</a>
			  	</div>
		  		<div class="card-body">
		    		<div class="">
				    	<form action="RegistrarUsuario" method="post">@csrf
				                <div class="row">
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">Nacionalidad:</p> 
				                    	<div class="form-group">
				    						<select required class="form-control" id="nacionalidad" name="nacionalidad" data-pattern-error="Selecciona una opción.">
											    <option selected>Seleccione..</option>
											    <option value="Venezolano">Venezolano</option>
											    <option value="Extranjero">Extranjero</option>
											</select>
			  							</div>
				                    </div>  
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">
				                            	Tipo de documento:</p>
				                       <div class="form-group">
				    						<select class="form-control" id="tipo_doc" name="tipo_doc" required="required" data-pattern-error="Selecciona una opción.">
											    <option selected>Seleccione..</option>
											    <option value="Pasaporte">Pasaporte</option>
											    <option value="Cedula">Cédula</option>
											</select>
			  							</div>
				                    </div>
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">
				                    	
				                    	Número de documento:</p>
				                      <input type="text" class="form-control" id="numero_doc" name="numero_doc" minlength="6" maxlength="8" pattern="[0-9]{6,8}" required="required" title="Sólo números de 6 a 8 dígitos." placeholder="Nº documento">
				                    </div>
				                </div>
				               
				                <div class="row">
				                	<div class="col-md-4"> 
				                		<p style="text-align: left;">
				                    	
				                    	Nombre:</p>
				                    	<input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos." minlength="3" maxlength="30" required="required" placeholder="Nombre" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos.">
				                    </div> 
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">
				                    	
				                    	Apellido:</p>
				                        <input type="text" class="form-control" id="apellido" name="apellido" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos." minlength="5" maxlength="30" required="required" placeholder="Apellido" data-pattern-error="El apellido sólo puede tener caracteres alfabéticos."> 
				                    </div>
				                    <div class="col-md-4"> 
				                    	<p style="text-align: left;">
				                    	
				                    	Sexo:</p>
				                      <div class="form-group">
				    						<select class="form-control" id="sexo" name="sexo" required="required">
											    <option selected>Seleccione..</option>
											    <option value="M">M</option>
											    <option value="F">F</option>
											</select>
			  							</div>
				                    </div> 
				                    
				                </div>
				               
				                <div class="row" style="margin-top: 15px;">
				                    <div class="col-md-6"> 
				                    <p style="text-align: left;">
				                    	<svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  											<path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
											<path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
										</svg>
				                    	Fecha de nacimiento:</p>
				                      <div class="form-group">
				    					<input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="F Nacimiento" max="2020-01-01" title="El formato de la fecha de nacimiento debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo).">								
			  							</div>
				                    </div> 
				                    <div class="col-md-6">
				                    	<p style="text-align: left;">
				                    	<svg class="bi bi-person-lines-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7 1.5a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5zm-2-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm2 9a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
										</svg>
				                    	Tipo de Usuario:</p>
				        				<div class="form-group">
				    						<select class="form-control" id="rol" name="rol">
											    <option selected>Seleccione..</option>
											    <option value="1">Administrador</option>
											    <option value="2">Entrenador</option>
											    <option value="3">Nutricionista</option>
											</select>
			  							</div>
				        		    </div>
				                </div>
				                
				                <div class="row">
				                 <div class="col-md-6"> 
				                 	<p style="text-align: left;">
				                    	<svg class="bi bi-arrows-move" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M6.5 8a.5.5 0 00-.5-.5H1.5a.5.5 0 000 1H6a.5.5 0 00.5-.5z" clip-rule="evenodd"/>
											<path fill-rule="evenodd" d="M3.854 5.646a.5.5 0 00-.708 0l-2 2a.5.5 0 000 .708l2 2a.5.5 0 00.708-.708L2.207 8l1.647-1.646a.5.5 0 000-.708zM9.5 8a.5.5 0 01.5-.5h4.5a.5.5 0 010 1H10a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
											<path fill-rule="evenodd" d="M12.146 5.646a.5.5 0 01.708 0l2 2a.5.5 0 010 .708l-2 2a.5.5 0 01-.708-.708L13.793 8l-1.647-1.646a.5.5 0 010-.708zM8 9.5a.5.5 0 00-.5.5v4.5a.5.5 0 001 0V10a.5.5 0 00-.5-.5z" clip-rule="evenodd"/>
											<path fill-rule="evenodd" d="M5.646 12.146a.5.5 0 000 .708l2 2a.5.5 0 00.708 0l2-2a.5.5 0 00-.708-.708L8 13.793l-1.646-1.647a.5.5 0 00-.708 0zM8 6.5a.5.5 0 01-.5-.5V1.5a.5.5 0 011 0V6a.5.5 0 01-.5.5z" clip-rule="evenodd"/>
											<path fill-rule="evenodd" d="M5.646 3.854a.5.5 0 010-.708l2-2a.5.5 0 01.708 0l2 2a.5.5 0 01-.708.708L8 2.207 6.354 3.854a.5.5 0 01-.708 0z" clip-rule="evenodd"/>
										</svg>
				                    	Dirección:</p>
				                      <input type="text" class="form-control" id="direccion" name="direccion" required="required" placeholder="Dirección">
				                    </div> 

				                    <div class="col-md-6"> 
				                    	<p style="text-align: left;">
				                    	<svg class="bi bi-inbox" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M3.81 4.063A1.5 1.5 0 014.98 3.5h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 01-.78.624l-3.7-4.624a.5.5 0 00-.39-.188H4.98a.5.5 0 00-.39.188L.89 9.312a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
											<path fill-rule="evenodd" d="M.125 8.67A.5.5 0 01.5 8.5H6a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124a1.5 1.5 0 01-1.489 1.314H1.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zm.941.83l.32 2.562a.5.5 0 00.497.438h12.234a.5.5 0 00.496-.438l.32-2.562H10.45a2.5 2.5 0 01-4.9 0H1.066z" clip-rule="evenodd"/>
										</svg>
				                    	Correo:</p>
				                      <input type="email" class="form-control" id="correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="Correo" required="required">
				                    </div>   
				                </div><br>

				               	<div class="row">
				                    <div class="col-md-6">
				                    	<p style="text-align: left;">
				                    	
				                    	Grado de Instrucción:</p>
				        				<div class="form-group">
				    						<select class="form-control" id="grado_Instrucc" name="grado_Instrucc">
											    <option selected>Seleccione..</option>
											    <option value="Primaria">Primaria</option>
											    <option value="Bachiller">Bachiller</option>
											    <option value="Tecnico Superior">Tecnico Superior</option>
											    <option value="Ingeniero">Ingeniero</option>
											    <option value="Licenciado">Licenciado</option>
											</select>
			  							</div>
				        		    </div>
				        		    <div class="col-md-6"> 
				                      <div class="form-group">
				                      	<p style="text-align: left;">
				                    	
				                    	Especialidad:</p>
				    					<input type="text" class="form-control" id="especialidad" name="especialidad" required="required" placeholder="Especialidad">								
			  							</div>
				                    </div> 
				                </div>
				                <div class="row">
				                    <div class="col-md-12"> 
				                    	<p style="text-align: left;">
				                    	<svg class="bi bi-lock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 00-1 1v5a1 1 0 001 1h7a1 1 0 001-1V9a1 1 0 00-1-1zm-7-1a2 2 0 00-2 2v5a2 2 0 002 2h7a2 2 0 002-2V9a2 2 0 00-2-2h-7zm0-3a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z" clip-rule="evenodd"/>
										</svg>
				                    	Contraseña:</p>
				                          <input type="password" name="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" placeholder="Contraseña">
				                    </div>  
				                   
				                </div><br>

				                <div class="row">
			                    	<div class="col-md-8"></div>
			                      		<div class="col-md-4" align="center">
			                      			<button type="submit" class="btn btn-success">Crear Usuario</button>
			                      		</div>
			                      		
			                    	</div>
			                    </div>
				       	</form>
		       	</div>
			</div>
		</div>
    </div>

    </section>

@endsection