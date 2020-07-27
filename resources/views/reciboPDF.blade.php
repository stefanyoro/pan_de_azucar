<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Recibo Corredor</title>
    
    <style>

        img {
            width: 80px;
            height: 60px;
            top: -10; 
            left: -20px;
            position: absolute;
        }

        .contenedor{
            position: relative;
            display: inline-block;
            text-align: center;
        }
        .campo1{
            font-family: verdana;
            font-size: 20px;
            position: relative;
            top: 20px;
            left: 100px;
            transform: translate(-50%, -50%);
            } 
.campo2{
            font-family: verdana;
            font-size: 10px;
            position: relative;
            top: 20px;
            left: 150px;
            transform: translate(-50%, -50%);
            } 
.campo3{
            font-family: verdana;
            font-size: 10px;
            position: relative;
            top: 20px;
            left: 14    0px;
            transform: translate(-50%, -50%);
            }             
.campo5{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 120px;
            left: 40px;
            transform: translate(-50%, -50%);
        }

.campo6{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 135px;
            left: 40px;
            transform: translate(-50%, -50%);
        }
.campo7{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 150px;
            left: 42px;
            transform: translate(-50%, -50%);
        }
.campo8{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 180px;
            left:95px;
            transform: translate(-50%, -50%);
        }
.campo9{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 195px;
            left: 95px;
            transform: translate(-50%, -50%);
        }
.campo10{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 210px;
            left: 78px;
            transform: translate(-50%, -50%);
        }  
.campo11{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 225px;
            left: 32px;
            transform: translate(-50%, -50%);
        }  

.campo12{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 255px;
            left: 50px;
            transform: translate(-50%, -50%);
        }                        

.campo13{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 270px;
            left: 38px;
            transform: translate(-50%, -50%);
        }     

.campo14{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 285px;
            left: 38px;
            transform: translate(-50%, -50%);
        }    
.campo15{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 300px;
            left: 46px;
            transform: translate(-50%, -50%);
        }  
.campo16{
            font-family: Arial;
            font-size: 14px;
            position: absolute;
            top: 400px;
            left: 200px;
            transform: translate(-50%, -50%);
        }            
                                         
</style>
</head>
<body >
    <div class="contenedor">
        <img src="img/recibo_1.png">
        <div class="campo1"><b>Recibo de Pago</div><br>
         <div class="campo2">Pan de Azùcar Bike Team <br> Dirección:
            Urbanización pan de azúcar montaña alta, carrizal. <br>Telefono:+58 4123084838</div>  
            <br>
         <div>-----------------------------------------------------------</div> 
         <div class="campo5"><b>Nombre:</b> {{ $persona->nombre}}</div>
         <div class="campo6"><b>Apellido:</b> {{ $persona->apellido}}</div>
         <div class="campo7"><b>Cedula:</b> {{ $persona->numero_doc}}</div>
         <br><br>
           <div>-----------------------------------------------------------</div>
       
        <div class="campo8"><b>Nombre de la carrera:</b> {{ $inscribir->carrera->nom_carrera}}</div>
        <div class="campo9"><b>Lugar de la Salida:</b>{{ $inscribir->carrera->lugar_salida}} </div> 
        <div class="campo10"><b>Lugar de Llegada :</b>{{ $inscribir->carrera->lugar_llegada}} </div> 
        <div class="campo11"><b>Costo:</b>{{ $inscribir->monto}}</div>
        <br><br><br>
         <div>-----------------------------------------------------------</div>
         <div class="campo12"><b>Kit del Competidor</b></div>
        <div class="campo13"><b>Camisa:</b>{{ $inscribir->carrera->camisa}} </div>
        <div class="campo14"><b>Comida:</b>{{ $inscribir->carrera->comida}} </div>
        <div class="campo15"><b>Hidratacion:</b>{{ $inscribir->carrera->bebida}} </div>
        <div class="campo16"><b>Monto Total:</b>{{$inscribir->monto}} </div>

     </div>
     
    
    </body>
</html>
