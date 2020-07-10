@extends('layouts.app')

@section('content')

<!-- END slider -->

<section class="section">

  <div class="container" align="center">
    <div class="col-md-10">
      @if(session()->has('data'))
      <div class="alert alert-success" role="alert">
        {{session('data')['mensaje']}}
      </div>
      @endif
      
      <div class="card" style="border-color:#B03A2E; background: transparent;">
        <div class="card-header" style="background-color: #B03A2E;">
          <a style="color: white;">Inscripciòn Corredor</a>
        </div>
  
        <div class="row">
          <div class="">

            <div class="container">
              <div class="row no-gutters">

                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Lugar de Salida</th>
                      <th scope="col">Lugar de Llegada</th>
                      <th scope="col">Hora</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Modalidad</th>
                      <th scope="col">Costo</th>
                      <th scope="col">Cupos</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($carreras as $clave => $carrera)
                    @if (($carrera->estatus == 1) and ($carrera->fecha_carr > now()->toDateString()))
                    <tr>
                      <th>{{ $carrera->nom_carrera}}</th>
                      <td>{{ $carrera->lugar_salida}}</td>
                      <td>{{ $carrera->lugar_llegada}}</td>
                      <td>{{ $carrera->hora}}{{ $carrera->meridiano}}</td>
                      <td>{{ $carrera->fecha_carr}}</td>
                      <td>{{ $carrera->modalidad}}</td>
                      <td>{{ $carrera->monto}},00bs.</td>
                      <td>{{ $carrera->cupos - App\Inscribir::where('carrera_id', $carrera->id)->count()}}</td>
                      <td><center>
                        @if(App\Inscribir::where('corredor_id', Auth::user()->corredor->id)->where('carrera_id', $carrera->id)->count() == 1)
                        <p align="right"><span href="inscripcionCorredores/{{$carrera->id}}" class="btn btn-info btn-sm">Inscrito</span></p>


                        @elseif($carrera->cupos > App\Inscribir::where('carrera_id', $carrera->id)->count())
                        <p align="right"><a href="inscripcionCorredores/{{$carrera->id}}" class="btn btn-success btn-sm">Inscribete</a></p>

                        @else
                        <p align="right"><span href="inscripcionCorredores/{{$carrera->id}}" class="btn btn-danger btn-sm">Agotado</span></p>
                        @endif
                        </center>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>

              </div>
              <br>
            </div>

          </div>
        </div>

</section> <!-- .section -->



@endsection