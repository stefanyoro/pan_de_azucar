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
            left: 140px;
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
            left: 80px;
            transform: translate(-50%, -50%);
        }
.campo9{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 195px;
            left: 76px;
            transform: translate(-50%, -50%);
        }
.campo10{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 210px;
            left: 56px;
            transform: translate(-50%, -50%);
        }  
.campo11{
            font-family: Arial;
            font-size: 12px;
            position: absolute;
            top: 225px;
            left: 38px;
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

     </div>
     
    
    </body>
</html>
