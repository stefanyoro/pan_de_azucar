@extends('layouts.app')
@section('css')
	<style type="text/css">
		.confirmacion{
			color: #3AB11F;
		}
		
		.negacion{
			text-indent: 2px;
			color: #F71A1A;
		}
	</style>
@endsection
 
@section('content')

    <!-- END slider -->
   
    <section class="section" style="background-image: url('img/registro17.jpg'); -webkit-background-size: cover;">
    	
    <div class="container" align="left">
    	<div class="col-md-8">
	    	<div class="card" style="border-color:#B03A2E; background: transparent;">
	    		<div class="card-header" style="background-color: #B03A2E;">
			    	
			  	</div>
		  		<div class="card-body">
		    		<div class="">
				    	<form action="RegistrarCorredor" method="post" enctype="multipart/form-data">@csrf
				            	<div class="card-header" style="height:50px; background-color:#4C4C4C;"> 
  										<p style="position:center; text-align: center; color: white;">Datos personales:</p>
  									</div>
  									<br>
				                <div class="row">
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">Nacionalidad:</p>
				                    	<div class="form-group">
				    						<select class="form-control" id="nacionalidad" name="nacionalidad" required>
											    <option selected disabled>Seleccione..</option>
											    <option value="Venezolano">Venezolano</option>
											    <option value="Extranjero">Extranjero</option>
											</select>
			  							</div>
				                    </div>  
				                    <div class="col-md-4">
				                       <div class="form-group">
				                       	<p style="text-align: left;">Tipo de Documento:</p>
				    						<select class="form-control" id="tipo_doc" name="tipo_doc" data-pattern-error="Selecciona una opción.">
											    <option selected disabled>Seleccione..</option>
											    <option value="Pasaporte">Pasaporte</option>
											    <option value="Cedula">Cédula</option>
											</select>
			  							</div>
				                    </div>
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">N° de Documento:</p>
				                      	<input type="text" class="form-control" id="numero_doc" name="numero_doc" minlength="6" maxlength="8" pattern="[0-9]{6,8}" required="required" title="Sólo números de 6 a 8 dígitos." placeholder="Nº documento">
				                    </div>
				                </div>
				               
				                <div class="row">
				                    <div class="col-md-4"> 
				                    	<p style="text-align: left;">Sexo:</p>
				                    	<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="sexo" id="F" value="F">
										  		<label class="form-check-label" for="F">Femenino</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="sexo" id="M" value="M">
										  		<label class="form-check-label" for="M">Masculino</label>
										</div>
				                    </div> 

				                    <div class="col-md-4"> 
				                    	<p style="text-align: left;">Nombre:</p>
				                    	<input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos." minlength="3" maxlength="30" required="required" placeholder="Ej. Ana" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos.">
				                    </div> 
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">Apellido:</p>
				                        <input type="text" class="form-control" id="apellido" name="apellido" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos." minlength="5" maxlength="30" required="required" placeholder="Ej. Pérez" data-pattern-error="El apellido sólo puede tener caracteres alfabéticos."> 
				                    </div>
				                    
				                </div>
				               <br>
				               
				                <div class="row" style="margin-top: 15px;">
				                    <div class="col-md-6"> 
				                    <p style="text-align: left;">Fecha de Nacimiento:</p>
				                      <div class="form-group">
				    					<input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="F Nacimiento" max="2004-01-01" title="El formato de la fecha de nacimiento debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)." required="required" onChange="calcularEdad(this.value);">								
			  							</div>

				                    </div> 
				                    <div class="col-md-6">
				                    	<p style="text-align: left;">Tipo:</p>
				        				<div class="form-group">
				    						<select class="form-control" id="rol" name="rol" required>
											    <option selected disabled>Seleccione..</option>
											    <option value="4">Corredor</option>
											</select>
			  							</div>
				        		    </div>
				                </div>
				                
				                <p style="text-align: left;">Dirección:</p>
				                <div class="row">
				                	<div class="col-md-4"> 
				                    	<select class="form-control" id="estado" name="estado">
				                     		<option value="" selected disabled> Estado</option>
    								 		@foreach($estados as $estado)
                      							<option  value="{{$estado->estado}}">{{$estado->estado}}</option>
                    						@endforeach
    									</select>
				                    </div>  

				                    <div class="col-md-4"> 
				                     	<select class="form-control" id="ciudad" name="ciudad">
				                     		<option value="" selected disabled> Ciudad </option>
				                     		@foreach($ciudades as $ciudad)
                      							<option  value="{{$ciudad->ciudad}}">{{$ciudad->ciudad}}</option>
                    						@endforeach
    								 		
    									</select>
				                    </div> 

				                	<div class="col-md-4"> 
				                     	<select class="form-control" id="municipio" name="municipio">
				                     		<option value="" selected disabled> Municipio </option>
    								 		@foreach($municipios as $municipio)
                      							<option  value="{{$municipio->municipio}}">{{$municipio->municipio}}</option>
                    						@endforeach
    									</select>
				                    </div> 
				                </div>
				                <br>
				                <div class="row" style="margin-top: 15px;">
				                    <div class="col-md-12"> 
				                    	<p style="text-align: left;">Correo:</p>
				                      <input type="email" class="form-control" id="correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="Ej. ana_perez@gmail.com" required="required">
				                    </div>  
				                </div><br>
				                <div class="row">
				                	<div class="col-md-12">
				                		<p style="text-align: left;">Foto de perfil:</p>
				                        <div class="custom-file">
			                          		<input type="file" class="form-control" name="foto">
			                            
			                        	</div>
				                	</div>
				                	
				                </div><br>
				               
				               	<div class="card-header" style="height:50px; background-color:#4C4C4C;"> 
  									<p style="position:center; text-align: center; color: white;">Composición Corporal:</p>
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
				               
				                <div class="card-header" style="height:50px; background-color:#4C4C4C;"> 
  										<p style="position:center; text-align: center; color: white;">Establecer contraseña</p>
  								</div>
  									<br>
				                <div class="row">
				                    <div class="col-md-6"> 
				                          <input type="password" name="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" placeholder="Contraseña">
				                    </div> 
				                    <div class="col-md-6"> 
				                          <input type="password" name="password2" class="form-control" id="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" placeholder="Confirmar contraseña">
				                    </div>

				                   
				                   
				                </div><br>

					           	<div class="custom-control custom-switch" align="left">
										  <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
										  <label class="custom-control-label" for="customSwitch1">Acepto los términos & condiciones y la política de privacidad.</label>
								</div><br>

				                <div class="row">
			                    	<div class="col-md-2"></div>
			                      		<div class="col-md-8" align="center">
			                          		<input type="submit" class="btn btn-success" value="Crear cuenta" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 200px;">
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

@section('scriptJS')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $('select#estado').change(function(){
        var ciudadId = $(this).val();
        $ciudaditems = $('.cityItems').remove();
        $.get('/ciudades/'+ciudadId, function(data){
            $.each(data, function(index, element){
            	//console.log(element);
                $('select#ciudad').append('<option value="'+element.id+'" class="cityItems">'+element.nombre+'</option>')
            });
        }, 'json');
    });

    $(document).ready(function() {
	//variables
	var pass1 = $('[name=password]');
	var pass2 = $('[name=password2]');
	var confirmacion = " ✔ Las contraseñas coinciden.";
	var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
	var negacion = "✘ No coinciden las contraseñas.";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion');	
	}
	if(valor1.length==0 || valor1==""){
	span.text(vacio).addClass('negacion');	
	}
	if(valor1.length<6 || valor1.length>10){
	span.text(longitud).addClass('negacion');
	}
	if(valor1.length!=0 && valor1==valor2){
	span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	});
});
</script>