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
	    			<a style="color: white;">Nuevo ejercicio</a>
	    		</div>
			  		<div class="card-body">
			  			<br>
			    		<div class="">
					        <form action="RegistrarEjercicio" method="post" enctype="multipart/form-data" id="formulario">@csrf   
					  			<div class="row">
					  				<div class="col-md-12">
					  				<p style="text-align: left;">Zonas de ejercicio:</p>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="zona" id="1" value="1">
										  	<label class="form-check-label" for="1">Abdomen</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="zona" id="2" value="2">
										  <label class="form-check-label" for="2">Brazos</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="zona" id="3" value="3">
										  <label class="form-check-label" for="3">Espalda</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="zona" id="4" value="4">
										  <label class="form-check-label" for="4">Hombros</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="zona" id="5" value="5">
										  <label class="form-check-label" for="5">Pecho</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="zona" id="6" value="6">
										  <label class="form-check-label" for="6">Piernas</label>
										</div>
									</div>
					  			</div>
					  			<br>
					  			<div class="row"> 
			                    <div class="col-md-6"> 
			                    	<p style="text-align: left;">Imágen del ejercicio:</p>
			                      <div class="form-group md-12">
                        
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" lang="es" name="foto" accept="image/x-png image/jpeg" pattern="image/x-png image/jpeg" placeholder="Imagen de la publicidad" required="required" data-pattern-error="La foto debe tener el formato .jpeg o .png (imag.png o imag.jpeg por ejemplo)." >
                          <label class="custom-file-label" for="customFileLang" style="text-align:left;">Subir archivo...</label>  
                        </div>  
			                      </div>
			                    </div> 
			                  </div> 
			                  <br>
								<div class="row">
									<div class="col-md-4">
										<p style="text-align: left;">Nombre:</p>
						                	<input type="text" class="form-control" id="nombre" name="nombre" title="Nombre del ejercicio." placeholder="Ej. Elevación frontal" required>
									</div>
									<div class="col-md-4">
										<p style="text-align: left;">Posición:</p>
						                	<input type="text" class="form-control" id="posicion" name="posicion" title="Posición para realizar el ejercicio." placeholder="Ej. Sentado sobre la máquina" required>
									</div>
									<div class="col-md-4">
										<p style="text-align: left;">Ejecución:</p>
						                	<input type="text" class="form-control" id="ejecucion" name="ejecucion" title="Ejecución precisa del ejercicio." placeholder="Ej. Llevar la barra hasta arriba" required>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">
										<p style="text-align: left;">Respiración:</p>
						                	<input type="text" class="form-control" id="respiracion" name="respiracion" title="Respiración dentro del ejercicio." placeholder="Ej. Inspirar y exhalar" required>
									</div>
									<div class="col-md-6">
										<p style="text-align: left;">Músculos implicados:</p>
						                	<input type="text" class="form-control" id="musculos" name="musculos" title="Nombres de los músculos implicados." placeholder="Ej. Espalda,trapecio..." required>
									</div>
									
								</div>
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
<script>
  // para traerme el nombre de la img
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

</script>
@endsection 