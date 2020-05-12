@extends('layouts.app')

 
@section('css')

@endsection

@section('content')

    <!-- END slider -->
   
    <section class="section" style="background-color: #CAC7C7;">

    	<div class="">
    		<div class="row">
    			<div class="col-md-1"></div>

    			<div class="col-md-7">
    				<div class="card" style="width: 45rem;">
					  <div class="card-body" style="border-radius: 20px;">
					  	 @foreach($personas as $persona)
							@foreach($corredores as $corredor)
					  	<table class="table table-borderless">
							<thead>
							   <tr style="background-color:#B03A2E;">
								   <th scope="col">	<h5 class="card-title" align="center" style="color: white;">Datos personales</h5></th>
								   <th scope="col">	<h5 class="card-title" align="center" style="color: white;">Composición corporal</h5></th>
								</tr>
							</thead>

							<tbody>
	    						<tr>
							      <td>
							      	<p class="card-text">
								    	<b>Nacionalidad</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{$persona->nacionalidad}}</p>

								    	<b>Correo electrónico</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->email}}</p>

								    	<b>Dirección</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{$persona->direccion}}</p>
								    
								    	<b>Fecha de registro</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{$persona->created_at}}</p>
								    </p>
							      </td>
							      <td>
							      	<p class="card-text">
								    	
								    	<b>Edad</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{$corredor->edad}}</p>

								    	<b>Peso</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{$corredor->peso}} kg</p>

								    	<b>Estatura</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{$corredor->estatura}} cm</p>
								    </p>
							      </td>
							    </tr>
							    
							    <tr>
							      	<td></td>
							      	<td style="text-align: right; color: grey;">
							      		<a href="vistaModificarPerfil" style="color: grey;">
							      			<svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	                                      <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd"/>
	                                    </svg>
							      			Modificar
							      		</a>
							      	</td>
							    	
							    </tr>
							</tbody>
						</table>
					  </div>
					</div>
    			</div>
    			<div class="col-md-4">
			    	<div class="card bg-light mb-3" style="max-width: 18rem; border-color:#B03A2E;">
					  <div class="card-header" align="center">
					  	<img src="img/user.jpg" style="width: 110px; height: 110px;">
					  </div>
					  	<div class="card-body">
						    <p class="card-text">
						    	<b>Nombre:</b> {{ Auth::user()->name }}<br>
						    	<b>Cédula:</b> {{$persona->numero_doc}}<br>
						    	<b>Sexo:</b> {{$persona->sexo}}<br>
						    	<b>Fecha de nacimiento:</b> {{$persona->fecha_nac}}<br>
						    	<b>Corredor:</b><br>
						    	<b>Categoría:</b><br>
						    </p>
					  	</div><br>
					  	<div class="row">
					  		<div class="col-md-4"></div>
					  		<div class="col-md-2">
					  			 <button type="button" class="btn btn-primary btn-sm">Carnet</button>
					  		</div>
					  	</div><br>
					</div>
				</div>
			</div>
			@endforeach
			@endforeach
		</div>
	</section>
@endsection

@section('css')

@endsection