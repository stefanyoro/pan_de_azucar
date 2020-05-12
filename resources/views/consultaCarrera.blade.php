@extends('layouts.app')
 
@section('content')

    <!-- END slider -->
   
       <section class="section" style="background-color: #CAC7C7;">

    	<div class="">
    		<div class="row">
    			<div class="col-md-2"></div>

    			<div class="col-md-10">
    				<div class="card" style="width: 60em;">
					  <div class="card-body" style="border-radius: 30px;">
					  	  <img src="img/pan11.jpg" class="card-img-top" alt="" width="150" height="450">
					  	<table class="table table-borderless">
						<thead>
						   <tr style="background-color:#B03A2E;">
							   <th scope="col">	<h2 class="card-title" aling="center" style="color: white; text-align: right;">Corrida Carrizal </h2></th>
							   	<th scope="col"><h2 class="card-title" align="center" style="color: white;"></h2></th>
							</tr>
						</thead>

						<tbody>
    						<tr>
						      <td>	
						      	<p class="card-text">

						      		<h5 class="card-title" aling="center" style="text-align: left;">Datos de la Cerrera</h5>
							    	
							    	<b>Fecha de la Carrera</b>

							    	<br>
							    		<p style="text-indent: 10%;"> <input type="date" class="form-control" id="fecha_carrera" name="fecha_carrera" placeholder="" title="El formato debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)." required> </p>

						      		<b>Ruta de la Carrera</b> 
						      		<br><br>
									<p style="text-indent: 10%;"><b>Lugar de Salida: </b>Llano Alto, Carrizal</p>
							    	<p style="text-indent: 10%;"><b>Lugar de llegada: </b>Los Teques, independencia </p>

									<p><b>Kit: </b> Camisa, Agua, Zapatos</p>
							    </p>
							     </td>
						      <td>

						      	<p class="card-text">
							    	<br><br><br><br><br><br>
							    	<b>Modalidad</b>
							    	<br>
							    		<p style="text-indent: 10%;">Asfalto- Ruta</p>

							    	<b>Hora</b>
							    	<br>
							    		<p style="text-indent: 10%;">07:30</p>

							    	<h5><b>Costo de la carrera</b>
							    	<br>
							    		<p style="text-indent: 10%;">1.250.000,00</p></h5>

							    </p>
						      </td>
						    </tr>
						    
						    <tr>
						      	<td></td>
						      	<td>
						      	
						      			<div class="col-md-6">
			                          		<input type="submit" class="btn btn-success btn-block py-3" value="Inscribirse" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
			                      		</div>
						      		</a>
						      	</td>
						    	
						    </tr>
						</tbody>
						</table>
						
					  </div>
					</div>
    			</div>
			</div>
			
		</div>
	</section>
  @endsection
