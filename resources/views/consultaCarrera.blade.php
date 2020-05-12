@extends('layouts.app')
 
@section('content')

<!-- END slider -->
   
<section class="section" style="background-color: #CAC7C7;">

	<div>
		<div class="row">
			<!-- <div class="col-md-2"></div> -->

			<div class="col-md-10 offset-2">
				<div class="card" style="width: 60em;">
				  	<div class="card-body" style="border-radius: 30px;">
						@foreach ($carreras as $carrera)
					  	<img src="{{ env('APP_URL').'/pan de azucar/storage/app/uploads/'.$carrera->foto }}" class="card-img-top" alt="" width="150" height="450">
					  	<table class="table table-borderless">
							<thead>
							   <tr style="background-color:#B03A2E;">
								   <th scope="col">	<h2 class="card-title" aling="center" style="color: white; text-align: right;">{{ $carrera->nom_carrera}}</h2></th>
								   	<th scope="col"><h2 class="card-title" align="center" style="color: white;"></h2></th>
								</tr>
							</thead>

							<tbody>
								<tr>
							      	<td>	
								      	<p class="card-text">
								      		<h3 class="card-title" aling="center" style="text-align: left;">Datos de la Cerrera</h3>
									    	<b>Fecha de la Carrera</b> 
									    	<br>
									    	<p style="text-indent: 10%;"> {{ $carrera->fecha_carr}} </p>
								      		<b>Ruta de la Carrera</b> 
								      		<br>
											<p style="text-indent: 10%;"><b>Lugar de Salida: </b>{{ $carrera->lugar_salida}}</p>
									    	<p style="text-indent: 10%;"><b>Lugar de llegada: </b>{{ $carrera->lugar_llegada}}</p>
											<p><b>Kit: </b> Camisa, Agua, Zapatos</p>
									    </p>
								    </td>
							      	<td>
								      	<p class="card-text">
									    	<br>
									    	<b>Modalidad</b>
									    	<br>
									    	<p style="text-indent: 10%;">{{ $carrera->modalidad}}</p>
									    	<b>Hora</b>
									    	<br>
									    	<p style="text-indent: 10%;">{{ $carrera->hora}}</p>
									    	<h5>
									    		<b>Costo de la carrera</b>
									    		<br>
									    		<p style="text-indent: 10%;">{{ $carrera->monto}}</p>
									    	</h5>
									    </p>
							      	</td>
							    </tr>
							    
							    <tr>
							      	<td></td>
							      	<td>
							      		<div class="col-md-6">
				                          	<input type="submit" class="btn btn-success btn-block py-3" value="Publicar" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
				                      	</div>
							      	</td>
							    	
							    </tr>
							</tbody>
						</table>
						@endforeach
				  	</div>
				</div>
			</div>
		</div>
		
	</div>
</section>
@endsection
