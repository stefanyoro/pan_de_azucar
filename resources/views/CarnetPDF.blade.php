<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Carnet del Corredor</title>
    
    <style>

        img {
            width: 240px;
            height: 390px;
            position: absolute;
        }

        .contenedor{
            position: relative;
            display: inline-block;
            text-align: center;
        }
        .campo1{
            font-family: Arial;
            font-size: 14px;
            position: relative;
            top: 255px;
            left: 21px;
            transform: translate(-50%, -50%);
        }
        .campo2{
            font-family: Arial;
            font-size: 14px;
            position: relative;
            top: 270px;
            left: -21px;
            transform: translate(-50%, -50%);
        }
        .campo3{
            font-family: Arial;
            font-size: 14px;
            position: absolute;
            top: 320px;
            left: 80px;
            transform: translate(-50%, -50%);
        }
        .campo4{
            font-family: Arial;
            font-size: 14px;
            position: absolute;
            top: 350px;
            left: 95px;
            transform: translate(-50%, -50%);
        }
        .campo5{
            font-family: Arial;
            font-size: 10px;
            position: absolute;
            top: 380px;
            left: 180px;
            transform: translate(-50%, -50%);
        }
        .foto{
            width: 120px;
            height: 140px;
            position: absolute;
            top: 45px;
            left: 60px;
        }

</style>
</head>
<body>
    <div class="contenedor">
        <img src="img/carnet5.png">
        <img img src="img/stefany.jpg" class="foto">
        <div class="">
            <div class="row">
                <div class="col-md-6"><div class="campo1"><b>Nombre:</b> {{ $persona->nombre}} {{ $persona->apellido}}</div></div>
            </div>
            <div class="row">
                <div class="col-md-6"><div class="campo2"><b>Cédula:</b> {{ $persona->numero_doc}}</div></div>
            </div>
            <div class="row">
                <div class="col-md-6"> <div class="campo3"><b>Tipo de Sangre:</b> {{ $persona->tipo_sangre}}</div></div>
            </div>
            <div class="row">
                <div class="col-md-6"><div class="campo4"><b>Contacto:</b> {{ $persona->telf_celular}}</div></div>
            </div>
            
        </div>
        <div class="campo5"><b>Vence: 31-12-20</b></div>
    </div>
    
    </body>
</html>
