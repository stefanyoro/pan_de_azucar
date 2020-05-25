@extends('layouts.app')
 
@section('content')

 </section> <!-- .section -->
    <section class="section bg-light element-animate">
    	<h1 align="center">Carreras Disponibles</h1>
    	<br>
      <div class="container">
        <div class="row no-gutters">
          @foreach ($carreras as $clave => $carrera)
           @if ($carrera->estatus == 1)
          <div class="col-md-6">
            <div class="sched d-block d-lg-flex">
              <div class="bg-image order-2" style="background-image: url('img/pan6.jpg'); height: 22vw;"></div>
                <div class="text order-1">                
                  <h3>{{ $clave + 1}}º Carrera <p style="text-indent: 05%;">{{ $carrera->nom_carrera}}</p></h3>
                  <p>El lugar de salida sera, {{ $carrera->lugar_salida}} y la meta final sera {{ $carrera->lugar_llegada}}.</p>
                  <p class="sched-time">
                    <span><span class="fa fa-clock-o"></span> {{ $carrera->hora}}{{ $carrera->meridiano}}</span> <br>
                    <span><span class="fa fa-calendar"></span> {{ $carrera->fecha_carr}}</span> <br>
                    <span><span class="fa fa-bicycle"></span> {{ $carrera->modalidad}}</span> <br>
                    <p style="text-align: right;"><span>Cupos Disponibles: {{ $carrera->cupos}}</span></p>

                    @if(App\Inscribir::where('corredor_id', Auth::user()->corredor->id)->where('carrera_id', $carrera->id)->count() == 1)
                    	<p align="right"><span href="inscripcionCorredores/{{$carrera->id}}" class="btn btn-info btn-sm">Inscrito</span></p>

                    
                    @elseif($carrera->cupos > App\Inscribir::where('carrera_id', $carrera->id)->count())
                    <p align="right"><a href="inscripcionCorredores/{{$carrera->id}}" class="btn btn-success btn-sm">Inscribete</a></p>

                    @else
                    <p align="right"><span href="inscripcionCorredores/{{$carrera->id}}" class="btn btn-danger btn-sm">Agotado</span></p>
                    @endif
                  </p>
                 
                </div>              
            </div>
          </div> 
          @endif
          @endforeach 

   </div>
        
      </div>
</section> <!-- .section -->
 


@endsection