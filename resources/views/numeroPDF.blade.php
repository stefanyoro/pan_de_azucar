<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <img src="img/logo2.jpg">
       
    </head>                
    <style>
      img {
        width: 80px;
        height: 80px;
        position: absolute;
        left: 2px;
                top: 01px;
                left: 01px;
      } 

      table {
        border-collapse: collapse;
      }

      table, td, th, tr {
        border: 1px solid black;
      }

      .contenedor{
        position: relative;
        display: inline-block;
        text-align: center;
        font-weight: normal;
      }
            
    .campo1{
      font-family: Arial;
      font-size: 240px;
      position: relative;
   
      } 
    </style>


    <body>
          <div class="contenedor">
            
          </div>  
          <div style=" text-align:center;">
             
              <div class="campo1">01{{$inscribir->id}}</div>
          </div>

    </body>
</html>
