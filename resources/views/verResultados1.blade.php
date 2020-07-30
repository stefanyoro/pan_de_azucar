@extends('layouts.app')
@section('content')
<section class="section">
  	<div class="container" align="center">
    	<div class="col-md-6">
      	<div class="row">
        	<div class="col-md-12">
      			<div class="card " style="border-color:#B03A2E; background: transparent;">        
        			<div class="card-header" style="background-color: #B03A2E; height: 40px; width: 100%">
         				 <p  style="color:white; text-align:left;"> Carreras Realizadas </p> 
        			</div>
              <form action="verResultados" method="post" enctype="multipart/form-data">@csrf
                <div class="row" align="left">                    
                	<div class="col-md-12">
              			<div class="card-body">
          						<h5> Seleccione la carrera:</h5> 
            							<div class="card col-md-12">
              							<div class="card-body">
              								@foreach($carreras as $carrera)
                              @if ($carrera->estatus == 1)
                							<a href="/verResultados/{{$carrera->id}}">
                                <h5 class="card-title">           									
                       						<label class="form-check-label" for="inlineRadio1" required="required">
                              		  {{$carrera->fecha_carr}} - {{$carrera->nom_carrera}} - {{$carrera->modalidad}}
			                            </label>                            
                                </h5>
                              </a>
                              @endif
					                   @endforeach                            
					                  </div>
					                </div>
					                <br>
					                <div class="row">
					                    <div class="col-md-12"align="center">
					                      <div class="col-md-6" >
					                         
					                      </div>
					                    </div>
					                </div>
					            </div>
  						      </div>                    
				          </div>
                </form>                  
        			</div>
            </div>
    			</div>
        </div>
			</div>
		</div>
	</div>
</div>                    
@endsection