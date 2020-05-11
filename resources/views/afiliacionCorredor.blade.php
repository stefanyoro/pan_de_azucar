@extends('layouts.blanco')
 
@section('content')

    <!-- END slider -->
   
    <section class="section" style="background-image: url('img/registro17.jpg'); -webkit-background-size: cover;">
    	
    <div class="container" align="left">
    	<div class="col-md-6">
	    	<div class="card" style="border-color:#B03A2E; background: transparent;">
	    		<div class="card-header" style="background-color: #B03A2E;">
			    	
			  	</div>
		  		<div class="card-body">
		    		<div class="">
				    	<form action="RegistrarCorredor" method="post">@csrf
				            	<div class="card-header" style="height:50px; background-color:#DBDBDB;"> 
  										<p style="position:center; text-align: center;">Datos personales:</p>
  									</div>
  									<br>
				                <div class="row">
				                    <div class="col-md-6"> 
				                    	<div class="form-group">
				    						<select class="form-control" id="nacionalidad" name="nacionalidad">
											    <option selected>Nacionalidad</option>
											    <option value="Venezolano">Venezolano</option>
											    <option value="Extranjero">Extranjero</option>
											</select>
			  							</div>
				                    </div>  
				                    <div class="col-md-6">
				                       <div class="form-group">
				    						<select class="form-control" id="tipo_doc" name="tipo_doc" data-pattern-error="Selecciona una opción.">
											    <option selected>Documento</option>
											    <option value="Pasaporte">Pasaporte</option>
											    <option value="Cedula">Cédula</option>
											</select>
			  							</div>
				                    </div>
				                </div>
				               
				                <div class="row">
				                    <div class="col-md-6"> 
				                      <div class="form-group">
				    						<select class="form-control" id="sexo" name="sexo" required="required">
											    <option selected>Sexo</option>
											    <option value="M">M</option>
											    <option value="F">F</option>
											</select>
			  							</div>
				                    </div> 
				                    <div class="col-md-6">
				                      <input type="text" class="form-control" id="numero_doc" name="numero_doc" minlength="6" maxlength="8" pattern="[0-9]{6,8}" required="required" title="Sólo números de 6 a 8 dígitos." placeholder="Nº documento">
				                    </div>
				                </div>
				               
				                <div class="row">
				                    <div class="col-md-6"> 
				                    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos." minlength="3" maxlength="30" required="required" placeholder="Nombre" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos.">
				                    </div> 
				                    <div class="col-md-6">
				                        <input type="text" class="form-control" id="apellido" name="apellido" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos." minlength="5" maxlength="30" required="required" placeholder="Apellido" data-pattern-error="El apellido sólo puede tener caracteres alfabéticos."> 
				                    </div>
				                </div>
				               
				                <div class="row" style="margin-top: 15px;">
				                    <div class="col-md-6"> 
				                      <div class="form-group">
				    					<input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="F Nacimiento" max="2020-01-02" title="El formato de la fecha de nacimiento debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo).">								
			  							</div>
				                    </div> 
				                    <div class="col-md-6">
				        				<div class="form-group">
				    						<select class="form-control" id="tipo_corredor" name="tipo_corredor">
											    <option selected>Tipo</option>
											    <option value="4">Corredor</option>
											</select>
			  							</div>
				        		    </div>
				                </div>
				                
				                <div class="row">
				                 <div class="col-md-12"> 
				                      <input type="text" class="form-control" id="direccion" name="direccion" required="required" placeholder="Dirección">
				                    </div>  
				                </div>

				                <div class="row" style="margin-top: 15px;">
				                    <div class="col-md-12"> 
				                      <input type="email" class="form-control" id="correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="Correo" required="required">
				                    </div>  
				                </div><br>
				               
				               	<div class="card-header" style="height:50px; background-color:#DBDBDB;"> 
  									<p style="position:center; text-align: center;">Composición Corporal:</p>
  								</div>
  								<br>
				               
				                <div class="row">
				                  <div class="col-md-4">
				                    <input type="text" class="form-control" id="edad" name="edad" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required="required" title="" placeholder="Edad">
				                  </div>
				                  <div class="col-md-4">
				                    <input type="text" class="form-control" id="peso" name="peso" minlength="2" maxlength="3" pattern="[0-9]{2,3}" required="required" data-pattern-error="Debe expresarse en kg." title="El peso debe estar expresado en kg." placeholder="Peso">
				                  </div>
				                  <div class="col-md-4">
				                   <input type="text" class="form-control" id="estatura" name="estatura" minlength="2" maxlength="4" pattern="[0-9]{2,4}" data-pattern-error="Debe expresarse en kg." required="required" title="" placeholder="Estatura">
				                  </div>
				                </div><br>
				               
				                <div class="card-header" style="height:50px; background-color:#DBDBDB;"> 
  										<p style="position:center; text-align: center;">Establecer contraseña</p>
  								</div>
  									<br>
				                <div class="row">
				                    <div class="col-md-12"> 
				                          <input type="password" name="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" placeholder="Contraseña">
				                    </div>  
				                   
				                </div><br>

					           	<div class="custom-control custom-switch" align="left">
										  <input type="checkbox" class="custom-control-input" id="customSwitch1">
										  <label class="custom-control-label" for="customSwitch1">Acepto los términos & condiciones y la política de privacidad.</label>
								</div><br>

				                <div class="row">
			                    	<div class="col-md-2"></div>
			                      		<div class="col-md-8" align="center">
			                          		<input type="submit" class="btn btn-primary btn-block py-3" value="Crear cuenta" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 200px;">
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