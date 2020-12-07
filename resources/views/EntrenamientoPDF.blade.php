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
          height: 3px;
          background-color: #B03A2E;
    }
            
   
    </style>
<body>

    <div class="contenedor">
            <div class="campo2">Pan de Azúcar Bike Team <br> Dirección:
              Urbanización pan de azúcar montaña alta, carrizal. <br>Telefono:+58 4123084838
            </div><br><br>
    </div><br>
    @foreach ($planes as $clave => $plan)
        @foreach ($usuarios as $usuario)
            @if($plan->corredor_id == $usuario->id)
                <b>Nombre:</b> {{$usuario->name}}<br>
                <b>Cédula:</b> {{$usuario->persona->numero_doc}}<br>
                <b>Sexo:</b> {{$usuario->persona->sexo}}<br>
                <b>Correo:</b> {{$usuario->email}}<br>
                <br>

                <center><b>Plan de entrenamiento personalizado:</b></center>

                <br>

                <b>MTB</b>
                <hr></hr><br>
                
                        <b>Tiempo:</b> {{$plan->mtb->tiempo}}<br>
                    
                        <b>Intensidad:</b> {{$plan->mtb->intensidad}}<br>
                    
                        <b>Cadencia:</b> {{$plan->mtb->cadencia}}<br>
                    
                        <b>Días:</b> {{$plan->mtb->dias}}<br>
                    <br><br>
                <b>RUTA:</b>
                <hr></hr><br>
                
                        <b>Tiempo:</b> {{$plan->ruta->tiempo}}<br>
                    
                        <b>Intensidad:</b> {{$plan->ruta->intensidad}}<br>
                    
                        <b>Cadencia:</b> {{$plan->ruta->frecuencia}}<br>
                    
                        <b>Días:</b> {{$plan->ruta->dias}}<br>
                    <br><br>
                 <b>GIMNASIO:</b>
                 <hr></hr><br>
                 
                        @if ($plan->gimnasio->zona == '1')
                        <b>Zona:</b> Abdomen <br>
                        @endif
                        @if ($plan->gimnasio->zona == '2')
                        <b>Zona:</b> Brazos <br>
                        @endif
                        @if ($plan->gimnasio->zona == '3')
                        <b>Zona:</b> Espalda <br>
                        @endif
                        @if ($plan->gimnasio->zona == '4')
                        <b>Zona:</b> Hombros <br>
                        @endif
                        @if ($plan->gimnasio->zona == '5')
                        <b>Zona:</b> Pecho <br>
                        @endif
                        @if ($plan->gimnasio->zona == '6')
                        <b>Zona:</b> Piernas <br>
                        @endif
                                            
                                           
                        <b>Nombre:</b> {{$plan->gimnasio->ejercicios->nombre}}<br>
                         
                        <b>Series:</b> {{$plan->gimnasio->series}} 4<br>
                    
                        <b>Repeticiones:</b> {{$plan->gimnasio->repeticiones}} 12<br>
                    
                        <b>Peso:</b> {{$plan->gimnasio->peso}} 40 kg<br>
                    
                        <b>Días:</b> {{$plan->gimnasio->dias}}  <br>                                          
             @endif
        @endforeach    
    @endforeach
    </body>
</html>