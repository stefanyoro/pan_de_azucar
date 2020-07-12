@extends('layouts.app')
 
@section('content')

<!-- END slider -->
   
<section class="section" >




	<div class="container" align="center">
		<div class="row">
	    	<div class="col-md-10 offset-2" >
				@if(session()->has('data'))
	    		<div class="alert alert-success" role="alert">
	    			{{session('data')['mensaje']}}
	    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
	   		 	</div>		
	   			 @endif
	   		</div>	
	   	</div>
		<div class="row">
			<!-- <div class="col-md-2"></div> -->

			<div class="col-md-10 offset-2">
				<div class="card" style="width: 60em;">
				  	<div class="card-body" style="border-radius: 30px;">
						@foreach ($carreras as $carrera)
					  	<img src="{{\Storage::url($carrera->foto)}}" width="100%" height="35%">
					  	<h2 class="card-title" aling="center height:50%" style="color: white; text-align: center; background-color:#B03A2E; height: 03vw;">{{ $carrera->nom_carrera}}</h2>
					  	<table class="table table-borderless">
							<thead>
							   <tr>
								   <th scope="col">	<h3 class="card-title" aling="center" style="text-align: left;">Datos de la Carrera</h3></th>
								   	<th scope="col"><h2 class="card-title" align="center" style="color: white;"></h2></th>
								</tr>
							</thead>

							<tbody>
								<tr>
							      	<td>	
								      	<p class="card-text">						    	
								    		<p>
								    			<i class="fa fa-calendar" aria-hidden="true"></i>
								    			<b>Fecha de la Carrera: </b>{{ $carrera->fecha_carr}} 
								    		</p>
								      		<b>
								      			<i class="fa fa-map-marker" aria-hidden="true"></i> 
								      			Ruta de la Carrera
								      		</b> 
								      		<br>
											<p style="text-indent: 10%;"><b>Lugar de Salida: </b>{{ $carrera->lugar_salida}}</p>
									    	<p style="text-indent: 10%;"><b>Lugar de llegada: </b>{{ $carrera->lugar_llegada}}</p>
									   	<p>
									    		<b>
									    			<i class="fa fa-bicycle" aria-hidden="true"></i> Modalidad:
									    		</b> 
									    		{{ $carrera->modalidad}}
									    	</p>
									    		
									    	<p>
									    		<b>
										    		<svg class="bi bi-alarm" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													  <path fill-rule="evenodd" d="M8 15A6 6 0 108 3a6 6 0 000 12zm0 1A7 7 0 108 2a7 7 0 000 14z" clip-rule="evenodd"/>
													  <path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v4a.5.5 0 01-.053.224l-1.5 3a.5.5 0 11-.894-.448L7.5 8.882V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
													  <path d="M.86 5.387A2.5 2.5 0 114.387 1.86 8.035 8.035 0 00.86 5.387zM11.613 1.86a2.5 2.5 0 113.527 3.527 8.035 8.035 0 00-3.527-3.527z"/>
													  <path fill-rule="evenodd" d="M11.646 14.146a.5.5 0 01.708 0l1 1a.5.5 0 01-.708.708l-1-1a.5.5 0 010-.708zm-7.292 0a.5.5 0 00-.708 0l-1 1a.5.5 0 00.708.708l1-1a.5.5 0 000-.708zM5.5.5A.5.5 0 016 0h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
													  <path d="M7 1h2v2H7V1z"/>
													</svg>
													Hora:
												</b> 
												{{ $carrera->hora}} {{ $carrera->meridiano}}
											</p>										
								    	<p>
								    		<b>
								    			<i class="fa fa-safari" aria-hidden="true"></i> Cantidad de Kilometraje:
								    		</b>
								    		{{ $carrera->kilometraje}}km.
								    	</p>
										<b>
											<i class="fa fa-bookmark-o" aria-hidden="true"></i>
											Categorias 
										</b>
											<p style="text-indent: 10%;">{{ $carrera->categoria}}</p>
								    </td>
							      	<td>
								      	<p class="card-text">
											<p>
									    		<b>
									    			<svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  				 		<path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                                  					</svg> 
									    			Cantidda de cupos:
									    		</b>
									    		{{ $carrera->cupos}}
									    	</p>
									    	<p>
									    		<b>
									    			<i class="fa fa-usd" aria-hidden="true"></i> Costo del kit de la carrera:
									    		</b>
									    		<p style="text-indent: 10%;"><b>Camisa:</b>{{ $carrera->camisa}},00 bs.</p>
									    		<p style="text-indent: 10%;"><b>Comida:</b>{{ $carrera->comida}},00 bs.</p>
									    		<p style="text-indent: 10%;"><b>Hidratación:</b>{{ $carrera->bebida}},00 bs.</p>
									    	</p>
									    	<p>
									    		<b>
									    			<i class="fa fa-refresh" aria-hidden="true"></i> Cantidad de Vueltas:
									    		</b>
									    		{{ $carrera->vuelta}}
									    	</p>
									    	
									    	<br>
									    	<h4>
									    		<b>Costo de la carrera</b>
									    		<br>
									    		<p style="text-indent: 10%;">{{ $carrera->monto}},00 bs.</p>
									    	</h4>
									    </p>
							      	</td>
							    </tr>							  						   
							</tbody>
						</table>
						<hr>
						<b>
							<p >
								<b>MTB - RUTA (F/M)</b>
									<div style="text-align: left;">
										<p style="text-indent: 30%;">
											<b>Juvenil</b>: 16 - 20 años &nbsp; &nbsp; &nbsp; &nbsp;
											<b>Senior</b>: 21 - 29 años 
										</p>
										<p style="text-indent: 30%;">
											<b>Master-A</b>: 30 - 39 años &nbsp;
											<b>Master-B</b>: 40 - 49 años
										</p>
										<p style="text-indent: 30%;">
											<b>Master-c</b>: 50 - 59 años &nbsp; 
											<b>Master-D</b>: 60 - 99 años 
										</p>
										<p style="text-indent: 30%;"><b>Elite </b>: 18 - 99 años</p>
									</div>
								</b>
							</p>
						@endforeach
				  	</div>
				</div>
			</div>
		</div>
		
	</div>
</section>
@endsection
