@extends('layouts.app')

 
@section('css')

@endsection

@section('content')

    <!-- END slider -->
    <section class="section">
    	<br>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="card" style="border-color:#B03A2E;">
						<div class="card-body">
					    	<div class="">
					    		<div class="row">
					    			<div class="col-md-8">
					    				<div class="row">
					    					<div class="col-md-6">
					  							<i class="fa fa-flag" aria-hidden="true"></i> <b>Estado:</b> {{Auth::user()->persona->estado}}
					  						</div>
					  						<div class="col-md-6">
					  							<i class="fa fa-chevron-circle-right" aria-hidden="true"></i><b> Ciudad:</b> {{Auth::user()->persona->ciudad}}
					  						</div>	
					    				</div><br>
					    				<div class="row">
					  						<div class="col-md-6">
					  							<i class="fa fa-mobile" aria-hidden="true"></i> <b>Teléfono móvil:</b>  {{Auth::user()->persona->telf_celular}}
					  						</div>
					  						<div class="col-md-6">
					  							<i class="fa fa-phone" aria-hidden="true"></i> <b>Teléfono de casa:</b>  {{Auth::user()->persona->telf_local}}
					  						</div>	
					  					</div><br>

					  					@if(Auth::user()->rol == '4')
								  		<div class="row">
								  			
								  			<div class="col-md-6">
								  				<i class="fa fa-balance-scale" aria-hidden="true"></i> <b>Peso:</b> {{Auth::user()->corredor->peso}} kg
								  			</div>
								  			<div class="col-md-6">
								  				<i class="fa fa-male" aria-hidden="true"></i> <b>Estatura:</b> {{Auth::user()->corredor->estatura}} cm
								  			</div>	
								  		</div><br>
					  					@endif

					  					@if(Auth::user()->rol == '1')
								  		<div class="row">
								  			<div class="col-md-6">
								  				<b>Especialidad:</b> {{Auth::user()->persona->administrador->especialidad}}
								  			</div>
								  			<div class="col-md-6">
								  				 <b>Grado de Instrucción:</b> {{Auth::user()->persona->administrador->grado_Instrucc}}
								  			</div>
								  		</div><br>
					  					@endif

								  		@if(Auth::user()->rol == '2')
								  		<div class="row">
								  			<div class="col-md-12">
								  				<b>Especialidad:</b> {{Auth::user()->persona->entrenador->especialidad}}
								  			</div>
								  		</div><br>
								  		@endif

								  		@if(Auth::user()->rol == '3')
								  		<div class="row">
								  			<div class="col-md-6">
								  				<b>Grado de Instrucción:</b> {{Auth::user()->persona->nutricionista->grado_Instrucc}}
								  			</div>
								  		</div><br>
					  					@endif

					  					<div class="row">
								  			<div class="col-md-12">
								  				<i class="fa fa-envelope" aria-hidden="true"></i> <b>Correo electrónico:</b> {{Auth::user()->email}}
								  			</div>
										</div><br>
										<div class="row">
								  			<div class="col-md-6"></div>
								  			<div class="col-md-6">
								  				<b>Fecha de registro:</b> {{Auth::user()->persona->created_at}}
								  			</div>
								  			
								  		</div><br>
								  		<i class="fa fa-pencil" aria-hidden="true"  style="color: grey;"></i><a href="vistaModificarPerfil"  style="color: grey;"> Modificar</a>
					    			</div>
					    			<div class="col-md-4">
					    				
					    				<img src="{{\Storage::url(Auth::user()->img)}}" class="rounded-circle" alt="..." style="height: 200px; width: 200px;"><br>
											<p style="text-indent: 25%;"><h4>{{ Auth::user()->name }} {{Auth::user()->persona->apellido}}</h4></p><br>
											<b>Nacionalidad:</b> {{Auth::user()->persona->nacionalidad}}<br>
											<b>Cédula:</b> {{Auth::user()->persona->numero_doc}}<br>
											<b>Sexo:</b> {{Auth::user()->persona->sexo}}<br>
											<b>Fecha de nacimiento:</b> {{Auth::user()->persona->fecha_nac}}<br>
											<b>Tipo de Sangre:</b> {{Auth::user()->persona->tipo_sangre}}<br> <br>
										<div class="">
											<div class="row">
												<div class="col-md-2"></div>
												<div class="col-md-5">
													<button type="button" class="btn btn-success"><a href="{{ route('CarnetPDF') }}" target="_blank" style="color: white;">
														<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														  <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zm1.854 2.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
														</svg> Carnet
													<a></button>
												</div>
											</div>
											
										</div>
					    			</div>
					    		</div>
					    	</div>
					  	</div>
					</div>
    				
    			</div>
			</div>
	</section>
@endsection

@section('css')

@endsection