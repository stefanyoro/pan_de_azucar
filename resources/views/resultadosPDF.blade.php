<style>
  img {
    width: 90px;
    height: 50px;
    position: absolute;
            top: 01px;
            left: 01px;
  } 

  table {
    border-collapse: collapse;
  }

  table, td, th {
    border: 1px solid black;
    padding: 20px;
  }
</style>


<img src="img/logo2.jpg">
<div style=" text-align:center;">
	<h3><b>Lista de Resultados: carrera - </b></h3>
</div>
<table class="table" style=" text-align:center;">
  <thead>
    <tr>
      <th > Número de Cedula</th>
      <th > Nombre</th>
      <th > Apellido</th>
      <th > Posicion</th>
       <th>Tiempo por Vuelta</th>
    </tr>
  </thead>
  <tbody>
   @foreach($carrera->inscribir as $clave=>$inscritos)    
                       
    <tr>
      <td> {{$inscritos->corredor->user->persona->numero_doc}}</td>
      <td> {{$inscritos->corredor->user->persona->nombre}}</td>
      <td> {{$inscritos->corredor->user->persona->apellido}}</td>
      <td> {{$clave+1}}</td>
      <td> @foreach($inscritos->resultado as $clave=> $tiempo)
       Tiempo {{$clave+1}}: {{$tiempo->tiempo}} <br>   
    @endforeach
    </td>
    </tr>
    @endforeach
  </tbody>
</table>