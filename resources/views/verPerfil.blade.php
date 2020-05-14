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
					  
							
					  	<table class="table table-borderless">
							<thead>
							   <tr style="background-color:#B03A2E;">
								   <th scope="col">	<h5 class="card-title" align="left" style="color: white;">Datos personales</h5></th>
								   @if(Auth::user()->rol == '4')
								  	 <th scope="col">	<h5 class="card-title" align="left" style="color: white;">Composición corporal</h5></th>
								   @endif
								   @if(((Auth::user()->rol == '1') or (Auth::user()->rol == '2')) or (Auth::user()->rol == '3'))
								   	<th scope="col">	<h5 class="card-title" align="left" style="color: white;">Datos laborales</h5></th> 
								   @endif
								</tr>
							</thead>

							<tbody>
	    						<tr>
							      <td>
							      	<p class="card-text">
								    	<b>Nacionalidad</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->persona->nacionalidad}}</p>

								    	<b>Correo electrónico</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->email}}</p>

								    	<b>Dirección</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->persona->direccion}}</p>
								    
								    	<b>Fecha de registro</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->persona->created_at}}</p>
								    </p>
							      </td>
								  @if(Auth::user()->rol == '4')
							      <td>
							      	<p class="card-text">
								    	
								    	<b>Edad</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->corredor->edad}}</p>

								    	<b>Peso</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->corredor->peso}} kg</p>

								    	<b>Estatura</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->corredor->estatura}} cm</p>
								    </p>
							      </td>
							    </tr>
							    @endif
							    @if(Auth::user()->rol == '1')
							      <td>
							      	<p class="card-text">
								    	
								    	<b>Especialidad</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->persona->administrador->especialidad}}</p>

								    	<b>Grado de Instrucción</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->persona->administrador->grado_Instrucc}}</p>
								    </p>
							      </td>
							    </tr>
							    @endif
							    @if(Auth::user()->rol == '2')
							      <td>
							      	<p class="card-text">
								    	
								    	<b>Especialidad</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->persona->entrenador->especialidad}}</p>
							      </td>
							    </tr>
							    @endif
							     @if(Auth::user()->rol == '3')
							      <td>
							      	<p class="card-text">
								    	
								    	<b>Grado de Instrucción</b>
								    	<br>
								    		<p style="text-indent: 10%;">{{Auth::user()->persona->nutricionista->grado_Instrucc}}</p>
								    </p>
							      </td>
							    </tr>
							    @endif
							    <tr>
							      	<td></td>
							      	<td style="text-align: right; color: grey;">
							      		<a href="vistaModificarPerfil" style="color: grey;">
							      			<svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
												<path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
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
						    	<b>Cédula:</b> {{Auth::user()->persona->numero_doc}}<br>
						    	<b>Sexo:</b> {{Auth::user()->persona->sexo}}<br>
						    	<b>Fecha de nacimiento:</b> {{Auth::user()->persona->fecha_nac}}<br>
						    	<b>Tipo de Sangre:</b><br>
						    	@if(Auth::user()->rol == '4')
						    		<b>Grupo de ciclismo:</b><br>
						    	@endif
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

		</div>
	</section>
@endsection

@section('css')

@endsection