@extends('layouts.app')
 
@section('content')

    <!-- END slider -->
   
    <section class="section">
    	
    <div class="container" align="center">
    	<div class="col-md-9">
	    	<div class="card" style="border-color:#B03A2E; background: transparent;">
	    		<div class="card-header" style="background-color: #B03A2E;">
			    	<a style="color: white;">Inscripciòn Corredor</a>
			  	</div>
		  		<div class="card-body">
		    		<div class="">
				    	
				             
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">
				                    	
				                    	Cedula:</p>
				                      <input type="text" class="form-control" id="numero_doc" name="numero_doc" minlength="6" maxlength="8" pattern="[0-9]{6,8}" required="required" title="Sólo números de 6 a 8 dígitos." placeholder="Nº documento" value="{{Auth::user()->persona->numero_doc}}" readonly>
				                    </div>
				                    
				                </div>
				               
				                <div class="row">
				                	<div class="col-md-4"> 
				                		<p style="text-align: left;">
				                    	
				                    	Nombre:</p>
				                    	<input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos." minlength="3" maxlength="30" required="required" placeholder="Nombre" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos." value="{{Auth::user()-> persona->nombre}}" readonly
				                  >
				                    </div> 
				                    <div class="col-md-4">
				                    	<p style="text-align: left;">
				                    	
				                    	Apellido:</p>
				                        <input type="text" class="form-control" id="apellido" name="apellido" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos." minlength="5" maxlength="30" required="required" placeholder="Apellido" data-pattern-error="El apellido sólo puede tener caracteres alfabéticos." value="{{Auth::user()->persona->apellido}}"readonly> 
				                    </div>
				                </div>
   				                </div>
				      
		       	</div>

			</div>
		</div>
    </div>
<div class="container" align="center">
    	<div class="col-md-6">
	    	<div class="card" style="border-color:#B03A2E; background: transparent;">
	    		<div class="card-header" style="background-color: #B03A2E;">
			    	<a style="color: white;">Pago Inscripcion</a>
			  	</div>
		  		<div class="card-body">
		    		<div class="">
				    	<form action="InscripcionCorredor" method="post">@csrf
				    			<div class="row">
				    				<div class="col-md-12">
				                    	<p style="text-align: left;">
				                    	
				                    	Nº Carrera:</p>
				                      <select class="form-control" name="carrera_id">
				                      	@foreach($carreras as $carrera)
				                      	<option value="{{$carrera->id}}">{{$carrera->nom_carrera}} - {{$carrera->lugar_salida}} - {{$carrera->lugar_llegada}} - {{$carrera->hora}} - {{$carrera->meridiano}} - {{$carrera->modalidad}} -
				                      	{{$carrera->categoria}} -
				                     	{{$carrera->monto}} -

				                         </option>
				                      	@endforeach
				                      </select>
				                    </div>
				                	<div class="col-md-12"> 
				                		<p style="text-align: left;">
				                    	
				                    	Metodo de pago: 
				                    	<select  class="form-control" name="metodoPago">
				                    		<option>Pago Movil</option>
				                    		<option>Transferencia</option>
				                    	</select>
				                    </div>
				                   <div class="col-md-12">
				                   	Banco emisor
    								<select class="form-control" id="banco" name="banco"><option value="" selected disabled>Seleccione </option><option value="0156">100% BANCO, BANCO UNIVERSAL C.A.</option><option value="0172">BANCAMIGA, BANCO MICROFINANCIERO C.A.</option><option value="0114">BANCARIBE C.A. BANCO UNIVERSAL</option><option value="0171">BANCO ACTIVO</option><option value="0007">BANCO BICENTENARIO</option><option value="0128">BANCO CARONI C.A. BANCO UNIVERSAL</option><option value="0177">BANCO DE LA FANB</option><option value="0102">BANCO DE VENEZUELA</option><option value="0163">BANCO DEL TESORO</option><option value="0115">BANCO EXTERIOR C.A. BANCO UNIVERSAL</option><option value="0105">BANCO MERCANTIL</option><option value="0191">BANCO NACIONAL DE CREDITO</option><option value="0116">BANCO OCCIDENTAL DE DESCUENTO</option><option value="0138">BANCO PLAZA, BANCO UNIVERSAL</option><option value="0108">BANCO PROVINCIAL</option><option value="0137">BANCO SOFITASA</option><option value="0168">BANCRECER, S.A. BANCO MICROFINANCIERO</option><option value="0134">BANESCO BANCO UNIVERSAL S.A.C.A.</option><option value="0174">BANPLUS BANCO UNIVERSAL, C.A.</option><option value="0151">BFC BANCO FONDO COMUN</option><option value="0157">DELSUR BANCO UNIVERSAL C.A.</option><option value="0169">MI BANCO, BANCO MICROFINANCIERO C.A.</option><option value="0104">VENEZOLANO DE CREDITO</option>
    								</select>
</div>
				                     <div class="col-md-12">
				                    	<p style="text-align: left;">
				                    	
				                    	Monto:</p>
				                      <input type="number" class="form-control" name="monto"  required="required" value="">
				                    </div>
				                    <div class="col-md-12">
				                    	<p style="text-align: left;">
				                    	
				                    	Nº de referencia:</p>
				                      <input type="number" class="form-control" name="referencia"  required="required" value="">
				                    </div>

				                    <div class="col-md-12">
				                    	<p style="text-align: left;">
				                    	
				                    	Fecha:</p>
				                      <input type="date" class="form-control" name="fecha"  required="required" value="">
				                    </div> 
				                    <div class="col-md-12">
				                    	<p style="text-align: left;">
				                    	
				                    	Descripcion:</p>
				                      <input type="text" class="form-control" name="descripcion"required="required" value="">
				                    </div>

				                   
				                    <div class="col-md-12">
				                    	<p style="text-align: left;">
				                    	
				                    </p>
				                      <input class="btn btn-success" type="submit" value="Enviar">
				                    </div>  
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