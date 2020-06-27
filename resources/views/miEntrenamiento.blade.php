@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<br>
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
	    			<a style="color: white;">Solicitud Plan de Entrenamiento</a>
	    		</div>
			  		<div class="card-body">
			  			<div class="row">
			  				<div class="col-md-6">
			  				<p style="text-align: center;"><b>PDF Plan de Entrenamiento</b></p><br>
			  					
			  					<div class="text-justify">
			  						Este plan de entrenamiento esta creado en un nivel básico para todos los corredores de la página. Duración: 1 semana.
			  					</div><br>
			  					<img src="img/PDF.png" style=" width: 70px; height: 80px;">
			  					<br><br>
			  					<button type="button" class="btn btn-success" onclick="location.href ='{{ route('planBasicoPDF') }}'">PDF</button>
			  					
			  				</div>
			  				<div class="col-md-6">
			  				<p style="text-align: center;"><b>Solicitud Plan de Entrenamiento</b></p><br>
			  					<div class="text-justify">
			  						¿{{Auth::user()->name}} deseas solicitar un plan de entrenamiento personalizado por el entrenador?
			  					</div><br>
			  					<img src="img/PDF.png" style=" width: 70px; height: 80px;"><br><br>
			  					<button type="button" class="btn btn-success" onclick="location.href ='{{ route('planBasicoPDF') }}'">Solicitar</button>

			  					
			  				</div>
			  				
			  			</div>
			  			
					</div>
			</div>
    	</div>
    </div>
</section>
@endsection
