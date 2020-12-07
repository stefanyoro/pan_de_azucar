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
	    			<a style="color: white;">Agregar nuevo alimento</a>
	    		</div>
			  		<div class="card-body">
			  			<br>
			    		<div class="">
					        <form action="registrarAlimento" method="post" enctype="multipart/form-data" id="formulario">@csrf   
					  			<div class="row">
					  				<div class="col-md-12">
					  				<p style="text-align: left;"><img src="img/seleccion.png" height="25" width="25"> Selección de categoría:</p>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="alimento" id="1" value="1">
										  	<label class="form-check-label" for="1">Leche/Derivados</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="alimento" id="2" value="2">
										  <label class="form-check-label" for="2">Carnes/Pescados</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="alimento" id="3" value="3">
										  <label class="form-check-label" for="3">Legumbres</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="alimento" id="4" value="4">
										  <label class="form-check-label" for="4">Hortalizas</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="alimento" id="5" value="5">
										  <label class="form-check-label" for="5">Frutas</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="alimento" id="6" value="6">
										  <label class="form-check-label" for="6">Cereales</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="alimento" id="7" value="6">
										  <label class="form-check-label" for="7">Aceites</label>
										</div>
									</div>
					  			</div>
					  			<br>
					  			
								<div class="row">
									<div class="col-md-12">
										<p style="text-align: left;"><img src="img/alimentos.png" height="25" width="25"> Nombre del alimento:</p>
						                	<input type="text" class="form-control" id="nombre" name="nombre" title="Nombre del ejercicio." placeholder="Ej. Manzana" required>
									</div>
									
								</div>
								<br>
								
								<br><br>
								<div class="row">				           		
								    <div class="col-md-8"></div>                  		
							        <div class="col-md-4">
							            <input type="submit" class="btn btn-success" value="Añadir" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
							        </div>			                     		
							    </div>
					
				            </form>
			  			</div>
					</div>
			</div>
    	</div>
    </div>
</section>

@endsection 