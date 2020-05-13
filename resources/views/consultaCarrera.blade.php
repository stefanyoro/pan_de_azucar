@extends('layouts.app')
 
@section('content')

<!-- END slider -->
   
<section class="section" style="background-color: #CAC7C7;">

	<div class="container" align="center">
		<div class="row">
			<!-- <div class="col-md-2"></div> -->

			<div class="col-md-10 offset-2">
				<div class="card" style="width: 60em;">
				  	<div class="card-body" style="border-radius: 30px;">
						@foreach ($carreras as $carrera)
					  	<img src="{{storage_path('app/public/Desierto.jpg')}}" class="card-img-top" alt="" width="150" height="450">
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
									    	<b>
									    		<svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  													<path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
													<path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
												</svg>
									    		Fecha de la Carrera
									    	</b> 
									    	<br>
									    	<p style="text-indent: 10%;"> {{ $carrera->fecha_carr}} </p>
								      		<b>
								      			<svg class="bi bi-geo-alt" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				                                  <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 002 6c0 4.314 6 10 6 10zm0-7a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
				                                </svg> 
								      			Ruta de la Carrera
								      		</b> 
								      		<br>
											<p style="text-indent: 10%;"><b>Lugar de Salida: </b>{{ $carrera->lugar_salida}}</p>
									    	<p style="text-indent: 10%;"><b>Lugar de llegada: </b>{{ $carrera->lugar_llegada}}</p>
											<p>
												<svg class="bi bi-check-box" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                   					<path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                    				<path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 003 14.5h10a1.5 1.5 0 001.5-1.5V8a.5.5 0 00-1 0v5a.5.5 0 01-.5.5H3a.5.5 0 01-.5-.5V3a.5.5 0 01.5-.5h8a.5.5 0 000-1H3A1.5 1.5 0 001.5 3v10z" clip-rule="evenodd"/>
                                 				</svg>
												<b>Kit de la carrera </b> 
												<p style="text-indent: 10%;">Camisa, Agua, Zapatos</p>
									    	</p>
									   	  <br>
										<b>
											<svg class="bi bi-bookmark" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    			<path fill-rule="evenodd" d="M8 12l5 3V3a2 2 0 00-2-2H5a2 2 0 00-2 2v12l5-3zm-4 1.234l4-2.4 4 2.4V3a1 1 0 00-1-1H5a1 1 0 00-1 1v10.234z" clip-rule="evenodd"/>
                                 			</svg>
											Categorias 
										</b>
											<p style="text-indent: 10%;">{{ $carrera->categoria}}</p>
								    </td>
							      	<td>
								      	<p class="card-text">
									    	<br><br><br>
									    	<b>Modalidad</b>
									    	<p style="text-indent: 10%;">{{ $carrera->modalidad}}</p>
									    	<b>
									    		<svg class="bi bi-alarm" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												  <path fill-rule="evenodd" d="M8 15A6 6 0 108 3a6 6 0 000 12zm0 1A7 7 0 108 2a7 7 0 000 14z" clip-rule="evenodd"/>
												  <path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v4a.5.5 0 01-.053.224l-1.5 3a.5.5 0 11-.894-.448L7.5 8.882V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
												  <path d="M.86 5.387A2.5 2.5 0 114.387 1.86 8.035 8.035 0 00.86 5.387zM11.613 1.86a2.5 2.5 0 113.527 3.527 8.035 8.035 0 00-3.527-3.527z"/>
												  <path fill-rule="evenodd" d="M11.646 14.146a.5.5 0 01.708 0l1 1a.5.5 0 01-.708.708l-1-1a.5.5 0 010-.708zm-7.292 0a.5.5 0 00-.708 0l-1 1a.5.5 0 00.708.708l1-1a.5.5 0 000-.708zM5.5.5A.5.5 0 016 0h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
												  <path d="M7 1h2v2H7V1z"/>
												</svg>
												 Hora: </b> 
												 <p  style="text-indent: 10%;">{{ $carrera->hora}} {{ $carrera->meridiano}}</p>
									    	<b>
									    		<svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  				  <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                                  				</svg> 
									    		Cantidda de cupos
									    	</b>
									    	<p  style="text-indent: 10%;">{{ $carrera->cupos}}</p>
									    	<br>
									    	<h5>
									    		<b>Costo de la carrera</b>
									    		<br>
									    		<p style="text-indent: 10%;">{{ $carrera->monto}},00 bs.</p>
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
