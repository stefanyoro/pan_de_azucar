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
                <div class="row">
                    <div class="col-md-6">
                        <b>Tiempo:</b> {{$plan->mtb->tiempo}}
                    </div>
                    <div class="col-md-6">
                        <b>Intensidad:</b> {{$plan->mtb->intensidad}}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <b>Cadencia:</b> {{$plan->mtb->cadencia}}
                    </div>
                    <div class="col-md-6">
                        <b>Días:</b> {{$plan->mtb->dias}}
                    </div>
                </div><br><br>
                <b>RUTA:</b>
                <hr></hr><br>
                <div class="row">
                    <div class="col-md-6">
                        <b>Tiempo:</b> {{$plan->ruta->tiempo}}
                    </div>
                    <div class="col-md-6">
                        <b>Intensidad:</b> {{$plan->ruta->intensidad}}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <b>Cadencia:</b> {{$plan->ruta->frecuencia}}
                    </div>
                    <div class="col-md-6">
                        <b>Días:</b> {{$plan->ruta->dias}}
                    </div>
                </div><br>
                 <b>GIMNASIO:</b>
                 <hr></hr><br>
                 <div class="row">
                                            <div class="col-md-6">
                                                @if ($plan->gimnasio->zona == '1')
                                                <b>Zona:</b> Abdomen
                                                @endif
                                                @if ($plan->gimnasio->zona == '2')
                                                <b>Zona:</b> Brazos
                                                @endif
                                                @if ($plan->gimnasio->zona == '3')
                                                <b>Zona:</b> Espalda
                                                @endif
                                                @if ($plan->gimnasio->zona == '4')
                                                <b>Zona:</b> Hombros
                                                @endif
                                                @if ($plan->gimnasio->zona == '5')
                                                <b>Zona:</b> Pecho
                                                @endif
                                                @if ($plan->gimnasio->zona == '6')
                                                <b>Zona:</b> Piernas
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                           
                                                <b>Nombre:</b> {{$plan->gimnasio->ejercicios->nombre}}
                                          </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Series:</b> {{$plan->gimnasio->series}} 4
                                            </div>
                                            <div class="col-md-4">
                                                <b>Repeticiones:</b> {{$plan->gimnasio->repeticiones}} 12
                                            </div>
                                            <div class="col-md-4">
                                                <b>Peso:</b> {{$plan->gimnasio->peso}} 40 kg
                                            </div>
                                        </div><br>
                                        <div class="row">
                                          <div class="col-md-6">
                                              <b>Días:</b> {{$plan->gimnasio->dias}}                                            
                                          </div>
                                          
                                        </div>
             @endif
        @endforeach    
    @endforeach
    </body>
</html>