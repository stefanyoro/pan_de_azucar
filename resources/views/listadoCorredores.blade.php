@extends('layouts.app')
 
@section('content')
 <section class="section">
  @if(Auth::user()->rol == '4')
 <h1> <p class="text-danger" align="center">Carreras Inscriptas por el Corredor</p></h1>

  @endif
  @if(Auth::user()->rol == '1')
   <h1 align="center">Inscripciones de Carreras</h1>
  <br>
  <div class="row justify-content-md-center">
    <div class="col-md-9">

  <div class="accordion" id="accordionExample">
    @endif
    @foreach($carreras as $carrera)

    @if(Auth::user()->rol == '1')
  <div class="card">

    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_{{$carrera->id}}" aria-expanded="true" aria-controls="collapse_{{$carrera->id}}">
          {{$carrera->nom_carrera}}-Lugar:{{$carrera->lugar_salida}} - Salida{{$carrera->lugar_llegada}} -hora{{$carrera->hora}}{{$carrera->meridiano}} - -categoria categoria{{$carrera->categoria}} -monto{{$carrera->monto}}
        </button>
      </h2>
    </div>

    <div id="collapse_{{$carrera->id}}" class="collapse" aria-labelledby="headingOne"  data-parent="#accordionExample">
      <div class="card-body">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Cèdula</th>
    </tr>
  </thead>
  <tbody>
    @endif
    @foreach($carrera->inscribir as $clave=> $personaInscribir)
    @if(Auth::user()->rol == '1')
    <tr>
      <th scope="row">{{$clave+1}}</th>
      <td>{{$personaInscribir->corredor->user->persona->nombre}}</td>
      <td>{{$personaInscribir->corredor->user->persona->apellido}}</td>
      <td>{{$personaInscribir->corredor->user->persona->numero_doc}}</td>
    </tr>

    @endif

    @if((Auth::user()->rol == '4') and ($personaInscribir->corredor->user_id == Auth::user()->id))
     
       <div class="row justify-content-md-center">
     <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$carrera->nom_carrera}}</h5>
        <p class="card-text">Lugar:{{$carrera->lugar_salida}} - Salida{{$carrera->lugar_llegada}} -hora{{$carrera->hora}}{{$carrera->meridiano}} - -categoria categoria{{$carrera->categoria}} -monto{{$carrera->monto}}</p>
       
      </div>
    </div>
  </div>
</div>
</div>
    @endif
    @endforeach
    @if(Auth::user()->rol == '1')
  </tbody>
</table>
   
      </div>
    </div>
  </div>
 @endif
  @endforeach

</div>
 </section>

@endsection