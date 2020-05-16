@extends('layouts.app')

 
@section('css')

@endsection

@section('content')

    <!-- END slider -->
   
    <section class="section"  style="background-color: #CAC7C7;">
    	<br>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-1"></div>
    			<div class="col-md-4">
			    	<img src="img/user.jpg" class="rounded-circle" alt="..." style="height: 200px; width: 200px;"><br>
					  
						<p style="text-indent: 25%;"><h4>{{ Auth::user()->name }} {{Auth::user()->persona->apellido}}</h4></p><br>
						<b>Cédula:</b> {{Auth::user()->persona->numero_doc}}<br>
						<b>Sexo:</b> {{Auth::user()->persona->sexo}}<br>
						<b>Fecha de nacimiento:</b> {{Auth::user()->persona->fecha_nac}}<br>
						<b>Tipo de Sangre:</b> {{Auth::user()->persona->tipo_sangre}}<br> <br>
						
						<button type="button" class="btn btn-success" onclick="location.href ='{{ route('CarnetPDF') }}'">Carnet</button>
				</div>
    			
    			<div class="col-md-6">
			    	<div class="card" style="border-color:#B03A2E;">
						<div class="card-header" style="background-color:#B03A2E;">
					    	<label style="color: white; text-align: center;" align="center">Detalles del perfil</label>
					  	</div>
					  	<div class="card-body">
					    	
					      		<i class="fa fa-flag" aria-hidden="true"></i> <b>Nacionalidad:</b> {{Auth::user()->persona->nacionalidad}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<i class="fa fa-chevron-circle-right" aria-hidden="true"></i><b> Dirección:</b> {{Auth::user()->persona->direccion}}<br><br>
								
								<i class="fa fa-envelope" aria-hidden="true"></i> <b>Correo electrónico:</b> {{Auth::user()->email}}<br><br>

								 @if(Auth::user()->rol == '4')
							     
								    <i class="fa fa-calendar-o" aria-hidden="true"></i> <b>Edad:</b> {{Auth::user()->corredor->edad}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    	
								    <i class="fa fa-balance-scale" aria-hidden="true"></i> <b>Peso:</b> {{Auth::user()->corredor->peso}} kg &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    
								    <i class="fa fa-male" aria-hidden="true"></i> <b>Estatura:</b> {{Auth::user()->corredor->estatura}} cm <br><br>

								    <b>Grupo de ciclismo:</b> {{Auth::user()->corredor->grupo_ciclismo}} <br><br>

							    @endif

							    @if(Auth::user()->rol == '1')
							     
								    <b>Especialidad:</b> {{Auth::user()->persona->administrador->especialidad}}

								    <b>Grado de Instrucción:</b> {{Auth::user()->persona->administrador->grado_Instrucc}}

							    @endif

							    @if(Auth::user()->rol == '2')
							     	<b>Especialidad:</b> {{Auth::user()->persona->entrenador->especialidad}}
				
							    @endif
							     @if(Auth::user()->rol == '3')
							     
								    <b>Grado de Instrucción:</b> {{Auth::user()->persona->nutricionista->grado_Instrucc}}

							    @endif

							    <i class="fa fa-mobile" aria-hidden="true"></i> <b>Teléfono móvil:</b>  {{Auth::user()->persona->telf_celular}} &nbsp;
							    <i class="fa fa-phone" aria-hidden="true"></i> <b>Teléfono de casa::</b>  {{Auth::user()->persona->telf_local}}  <br><br>
								<p style="text-align: center;"><b>Fecha de registro:</b>{{Auth::user()->persona->created_at}}</p><br>

								<i class="fa fa-pencil" aria-hidden="true"  style="color: grey;"></i><a href="vistaModificarPerfil"  style="color: grey;"> Modificar</a>

					  </div>
					</div>
				</div>
			</div>
	</section>
@endsection

@section('css')

@endsection