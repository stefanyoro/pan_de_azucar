
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
  }
</style>


<img src="img/logo2.jpg">
<div style=" text-align:center;">
	<h3><b>Listado de Carreras</b></h3>
</div>
<table class="table" style=" text-align:center;">
<thead>  
    <tr>
      <th >Num</th>
      <th >Fecha Carrera</th>
      <th >Nombre Carrera</th>
      <th >Hora</th>
      <th >Lugar salida</th>
      <th >Lugar llegada</th>
      <th >Modalidad</th>
      <th >Categoria</th>
      <th >  Monto   </th>
      <th >Cupos</th>
      <th >Costo camisa</th>
      <th >Costo comida</th>
      <th >Costo bebida</th>
    </tr>
</thead>
<tbody>
  @foreach ($carreras as $clave => $carrera)
   @if ($carrera->estatus == 1)
	<tr>
		<td>{{ $clave + 1}}</td>
    	<td>{{ $carrera->fecha_carr}}</td>
    	<td>{{ $carrera->nom_carrera}}</td>
    	<td>{{ $carrera->hora}}{{ $carrera->meridiano}}</td>
    	<td>{{ $carrera->lugar_salida}}</td>
    	<td>{{ $carrera->lugar_llegada}}</td>
    	<td>{{ $carrera->modalidad}}</td>
    	<td>{{ $carrera->categoria}}</td>
    	<td>{{ $carrera->monto}}</td>
    	<td>{{ $carrera->cupos}}</td>
    	<td>{{ $carrera->camisa}}</td>
    	<td>{{ $carrera->comida}}</td>
    	<td>{{ $carrera->bebida}}</td>
	</tr>
	@endif
	@endforeach

</tbody>
</table>

