@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<br>
<section class="section">
    	<br>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="card" style="border-color:#B03A2E;">
						<div class="card-body">
					    	<div class="">
					    		<div class="row">
					    			<div class="col-md-12">
					    				<p style="text-align: center;"><b>PDF Plan de Entrenamiento</b></p><br>
			  					
			  					<div class="text-justify">
			  						Este plan de entrenamiento esta creado en un nivel básico para todos los corredores de la página. Duración: 1 semana.
			  					</div><br>
			  					<center><img src="img/PDF.png" style=" width: 70px; height: 80px;"></center>
			  					<br><br>
			  					<center><button type="button" class="btn btn-success"><a href="{{ route('planBasicoPDF') }}" target="_black" style="color: white;">PDF</a></button></center>
			  					

									  	
					    			</div>
					    
					    		</div>
					    	</div>
					  	</div>
					</div>
    				
    			</div>
    			<div class="col-md-8">
    				<div class="card" style="border-color:#B03A2E;">
						<div class="card-body">
					    	<div class="">
					    		<div class="row">
					    			
					    			<div class="col-md-12">
					    				<table id="listadoPlanes" class="table table-borderless">
		                        <thead>  
		                          <tr>
		                            <th>N◦</th>
		                            <th>Nombre del Plan</th>
		                            <th>Fecha de Creación</th>
		                            <th>PDF</th>
		                          </tr>
		                        </thead>
		                            <tbody>
		                            	@foreach ($planes as $clave => $plan)
		                            		
		                            			@if($plan->corredor_id == Auth::user()->id)
		                            			@if($plan->status == 1)
				                              	<tr>
				                                	<td>{{ $clave + 1}}</td>
							                        <td>{{ $plan->nombre}}</td>
							                        <td>{{ $plan->fecha}}</td>
							                        <td >
                            <!-- visualizar -->
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-info btn-sm"><a href="{{ url('EntrenamientoPDF/'.$plan->id) }}" target="_black" style="color: black;">
                                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                              </button>
                             
                          </td>
						                        </tr>
						                        @endif
						                        @endif
						                	
		                           		@endforeach
		                            </tbody>
		                    </table>
					    				
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
