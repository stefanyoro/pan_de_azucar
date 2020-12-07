<!DOCTYPE html>
<html lang="es">
    <head>
   
        <meta charset="UTF-8">
        <img src="img/logo2.jpg">

</head>
 <style>
      img {
        width: 90px;
        height: 50px;
        position: absolute;
                top: 01px;
                left: 01px;
      } 

      .contenedor{
        position: relative;
        display: inline-block;
        text-align: center;
        font-weight: normal;
      }
      hr {
          height: 2px;
          background-color: #B03A2E;
      }
      table {
        border-collapse: collapse;
      }

      table, td, th, tr {
        border: 1px solid black;
      }
      
      table{
        table-layout: fixed;
        width: 700px;
        font-weight: normal;
      }

      th, td {
        width: 100px;
        word-wrap: break-word;
        font-weight: normal;
      }     
   
    </style>
  <body>
    <div class="contenedor">
        <div class="campo2">Pan de Azúcar Bike Team <br> Dirección:
              Urbanización pan de azúcar montaña alta, carrizal. <br>Telefono:+58 4123084838
            </div><br><br>
        </div><br>

        @foreach ($planes as $plan)
          @foreach ($usuarios as $usuario)
            @if($plan->corredor_id == $usuario->id)
                <b>Nombre:</b> {{$usuario->name}}<br>
                <b>Cédula:</b> {{$usuario->persona->numero_doc}}<br>
                <b>Sexo:</b> {{$usuario->persona->sexo}}<br>
                <b>Correo:</b> {{$usuario->email}}<br>
                <br>

                <center><b>Plan Alimenticio Personalizado:</b></center>

                <hr></hr><br>
                <b>Nombre del plan:</b> {{$plan->nombre_plan}}<br>
                <b>Fecha de creación:</b> {{$plan->fecha}}<br>
                <b>Descripción:</b> {{$plan->descripcion}}<br>
                <br>
                <table>
                  <thead>
                    <tr>
                        <th style="background-color: #B03A2E; color: white;">ALIMENTO</th>
                        <th style="background-color: #B03A2E; color: white;">TIPO</th>
                        <th style="background-color: #B03A2E; color: white;">PORCION</th>
                        <th style="background-color: #B03A2E; color: white;">EQUIVALENTE</th>
                        <th style="background-color: #B03A2E; color: white;">DIAS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align: center; background-color: #FFF1EF; color: black;">LECHE - DERIVADOS</td>
                      <td style="text-align: center;">
                        @foreach ($leches as $leche)
                          @if($leche->id == $plan->id_leche)
                            {{$leche->nombre}}
                          @endif
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$plan->porcion_leche}}</td>
                      <td style="text-align: center;">{{$plan->equivalente_leche}}</td>
                      <td style="text-align: center;">{{$plan->dias_leche}}</td>
                    </tr>

                    <tr>
                      <td style="text-align: center; background-color: #FFF1EF; color: black;">CARNE - PESCADO</td>
                      <td style="text-align: center;">
                        @foreach ($carnes as $carne)
                          @if($carne->id == $plan->id_carnes)
                            {{$carne->nombre}}
                          @endif
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$plan->porcion_carne}}</td>
                      <td style="text-align: center;">{{$plan->equivalente_carne}}</td>
                      <td style="text-align: center;">{{$plan->dias_carne}}</td>
                    </tr>

                    <tr>
                      <td style="text-align: center; background-color: #FFF1EF; color: black;">LEGUMBRES</td>
                      <td style="text-align: center;">
                        @foreach ($legumbres as $legumbre)
                          @if($legumbre->id == $plan->id_legumbres)
                            {{$legumbre->nombre}}
                          @endif
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$plan->porcion_legumbre}}</td>
                      <td style="text-align: center;">{{$plan->equivalente_legumbre}}</td>
                      <td style="text-align: center;">{{$plan->dias_legumbre}}</td>
                    </tr>

                    <tr>
                      <td style="text-align: center; background-color: #FFF1EF; color: black;">HORTALIZAS</td>
                      <td style="text-align: center;">
                        @foreach ($hortalizas as $hortaliza)
                          @if($hortaliza->id == $plan->id_hortalizas)
                            {{$hortaliza->nombre}}
                          @endif
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$plan->porcion_hortaliza}}</td>
                      <td style="text-align: center;">{{$plan->equivalente_hortaliza}}</td>
                      <td style="text-align: center;">{{$plan->dias_hortaliza}}</td>
                    </tr>

                    <tr>
                      <td style="text-align: center; background-color: #FFF1EF; color: black;">FRUTAS</td>
                      <td style="text-align: center;">
                        @foreach ($frutas as $fruta)
                          @if($fruta->id == $plan->id_frutas)
                            {{$fruta->nombre}}
                          @endif
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$plan->porcion_fruta}}</td>
                      <td style="text-align: center;">{{$plan->equivalente_fruta}}</td>
                      <td style="text-align: center;">{{$plan->dias_fruta}}</td>
                    </tr>

                    <tr>
                      <td style="text-align: center; background-color: #FFF1EF; color: black;">CEREALES</td>
                      <td style="text-align: center;">
                        @foreach ($cereales as $cereal)
                          @if($cereal->id == $plan->id_cereales)
                            {{$cereal->nombre}}
                          @endif
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$plan->porcion_cereal}}</td>
                      <td style="text-align: center;">{{$plan->equivalente_cereal}}</td>
                      <td style="text-align: center;">{{$plan->dias_cereal}}</td>
                    </tr>

                    <tr>
                      <td style="text-align: center; background-color: #FFF1EF; color: black;">MANTECA - ACEITE</td>
                      <td style="text-align: center;">
                        @foreach ($aceites as $aceite)
                          @if($aceite->id == $plan->id_aceites)
                            {{$aceite->nombre}}
                          @endif
                        @endforeach
                      </td>
                      <td style="text-align: center;">{{$plan->porcion_aceite}}</td>
                      <td style="text-align: center;">{{$plan->equivalente_aceite}}</td>
                      <td style="text-align: center;">{{$plan->dias_aceite}}</td>
                    </tr>
                  </tbody>
                </table>
                

            @endif
          @endforeach
        @endforeach
    </div>
  </body>
</html>