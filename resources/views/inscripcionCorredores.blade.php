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
			    	<a style="color: white;">Inscripciòn Corredor</a>
			  	</div>
		  		<div class="row">
		    		<div class="">
				    	
				        <form method="post"action="{{route('guardarInscripcionCorredores')}}" enctype="multipart/form-data" >@csrf     
				                    <div class="col-md-9">
				                    	<p style="text-align: left;">
				                    	
				                    	Cedula:</p>
				                      <input type="text" class="form-control" id="numero_doc" name="numero_doc" minlength="6" maxlength="8" pattern="[0-9]{6,8}" required="required" title="Sólo números de 6 a 8 dígitos." placeholder="Nº documento" value="{{Auth::user()->persona->numero_doc}}" readonly>
				                    </div>
				                    
				                </div>
				               
				                	<div class="col-md-4"> 
				                		<p style="text-align: left;">
				                    	
				                    	Nombre:</p>
				                    	<input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos." minlength="3" maxlength="30" required="required" placeholder="Nombre" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos." value="{{Auth::user()-> persona->nombre}}" readonly
				                  >
				                    </div> 
				                    <div class="col-md-4">
				                    	<p style="text-align: left;"align="center">
				                    	
				                    	Apellido:</p>
				                        <input type="text" class="form-control" id="apellido" name="apellido" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos." minlength="5" maxlength="30" required="required" placeholder="Apellido" data-pattern-error="El apellido sólo puede tener caracteres alfabéticos." value="{{Auth::user()->persona->apellido}}"readonly> 
				                    </div>
				               
   				       </div>
<br>				      
		       	</div>

			</div>
		</div>

<div class="container" align="center">
    	<div class="col-md-9">
	    	<div class="card" style="border-color:#B03A2E; background: transparent;">	
	    		<div class="card-header" style="background-color: #B03A2E;">
			    	<a style="color: white;">Informaciòn de Carrera
			    	</a>
			  	</div>
			  	
			  	<div class="col-md-12"> <br>
				                    	<p style="text-align: left;"<i class="fa fa-newspaper-o" aria-hidden="true"></i>
				                    	Informacion de Carrera:
				                      <select class="form-control" name="carrera_id">
				                      	@foreach($carreras as $carrera)
				                      	<option value="{{$carrera->id}}">Nombre:{{$carrera->nom_carrera}} -Lugar {{$carrera->lugar_salida}} - hora{{$carrera->hora}} {{$carrera->meridiano}}

				                         </option>
				                      	@endforeach
				                      </select>
				    </div>
				    <br>
				    <div class="card-header" style="background-color: #B03A2E;">
			    	<a style="color: white;">Inscripcion de pago</a>
			  	</div>

		  		<div class="card-body">
		    		
				    	
				<div class="row">
									<div class="col-md-12">
				                    	<p style="text-align: left;"><i class="fa fa-circle-o" aria-hidden="true"></i> Capture de Pantalla:</p> 
				                    	<input type="file" class="form-control" name="comprobante">
				                    </div>  

				                    <div class="col-md-4">
				                    	<p style="text-align: left;"><i class="fa fa-circle-o" aria-hidden="true"></i> Metodo de pago:</p>  
				                    	<select  class="form-control" name="metodoPago">
				                    		<option>Pago Movil</option>
				                    		<option>Transferencia</option>
				                    	</select>
				                    </div>  
	
									<div class="col-md-4">
				                    	<p style="text-align: left;"><i class="fa fa-university" aria-hidden="true"></i> Banco emisor:</p>  
				                    
    								<select class="form-control" id="banco" name="banco">
    									<!--<option value="" selected disabled>Seleccione </option>-->
    								 @foreach($bancos as $banco)
                      					<option  value="{{$banco->codigo}}">
                       					 {{$banco->nombre}}
                      					</option>
                    					@endforeach
    								</option>
    								</select>
								</div>

									<div class="col-md-4">
				                    	<p style="text-align: left;"><i class="fa fa-usd" aria-hidden="true"></i> Monto:</p>  
				                      <input id="monto" type="number" class="form-control" name="monto"  required="required" value="{{$monto = $carrera->monto}}" readonly>
				                    <br>
				                    </div>
				                   
				                      <div class="col-md-4">
				                    	<p style="text-align: left;"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i> Nº de referencia:</p>
				                      <input type="number" class="form-control" name="referencia"  required="required" value="">
				                    </div>
				                    <div class="col-md-4">
				                    	<p style="text-align: left;"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha:</p>
				                      <input type="date" class="form-control" name="fecha"  required="required" value="">
				                    </div> 
				                     <div class="col-md-4">
				                    	<p style="text-align: left;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Descripciòn:</p>
				                      <input type="text" class="form-control" name="descripcion"  required="required" value="">
				                    </div> 
				                    <div id="container"><h1>KIT</h1>
									<input type="checkbox" name="ch1" value="{{$carrera->camisa}}" id="qr1" />Camisa <br />
									<input type="checkbox" name="ch1" value="{{$carrera->comida}}" id="qr1" />Comida <br />
									<input type="checkbox" name="ch1" value="{{$carrera->bebida}}" id="qr1" />Hidrataciòn <br />
									</div>
                 
					                </div> 
					                </div>  
					                    <div class="col-md-12">
					                    	<p style="text-align: left;">
					                    </p>
					                      <input class="btn btn-success" type="submit" value="Enviar">
					                    </div>  
					                    <br>
					                   </div>
	   				                </div>


				      	</form>

		       	</div>
			</div>
		</div>
		<br>
    </div>

    </section>

@endsection
@section('scriptJS')
<script type="text/javascript">
	function displayVals() {
      calcUsage();
}
var $cbs = $('input[name="ch1"]');
function calcUsage() {
    var total = {{$monto}};
    $cbs.each(function() {
        if (this.checked)
            total = parseInt(total) + parseInt(this.value);
    });
    $("#usertotal").text(total);
    $("#monto").val(total);
}

    $("select").change(displayVals);
    displayVals();
//For  checkboxes

$cbs.click(calcUsage);

</script>
@endsection