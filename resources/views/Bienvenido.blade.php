<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro exitoso</title>
    </head>
    <body>
        <h2>¡Bienvenido a Pan de Azúcar {{ $user->name }}!</h2>
        ¡Gracias por registrarte!
        <br>
        <div class="text-justify">
            Te damos cordialmente la bienvenida a Pan de azúcar bike team, donde podrás disfrutar de los servicios creados especialmente para ti. 
        </div>
        <br>
        <b>Datos de registro:</b>
        <br>
            <b>Nombre:</b> {{$user->name}}<br>

            <b>Correo:</b> {{$user->email}}<br>
        
        <p>¡Esperamos que nuestra aplicación te sea de gran utilidad!</p>

    </body>
</html>