@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<style type="text/css">
        .confirmacion{
            color: #3AB11F;
        }
        
        .negacion{
            text-indent: 2px;
            color: #F71A1A;
        }
    </style>
    <!-- END slider -->
    <br>
<section class="section body">
    <div class="container" align="center">
        <div class="col-md-8">
            @if(session()->has('data'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('data')['mensaje']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>    
        @endif
            <div class="card" style="border-color: #B03A2E;">
                <div class="card-header" style="background-color: #B03A2E;">
                    <h5 style="color: white;">Cambiar contraseña</h5> 
                </div>
                <div class="card-body" >
                <div class="">
                 
                   <form action="cambiarContraseña" method="post">@csrf

                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="row">
                        <div class="col-md-4">
                            <p style="text-align: left;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Nombre:</p>
                            <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos." minlength="3" maxlength="30" required="required" placeholder="Nombre" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos." value="{{Auth::user()->persona->nombre}}" >
                            
                        </div>
                         <div class="col-md-8">
                            <p style="text-align: left;"><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo:</p>
                            <input type="email" class="form-control" id="correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="Correo" required="required" value="{{Auth::user()->email}}" >
                        </div><br>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6"> 
                            <p style="text-align: left;"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Nueva contraseña:</p> 
                            <input type="password" name="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" placeholder="Contraseña">
                        </div> 
                        <div class="col-md-6"> 
                            <p style="text-align: left;"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Confirmar contraseña:</p> 
                            <input type="password" name="password2" class="form-control" id="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" placeholder="Confirmar contraseña">
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-success">Enviar</button>
                   </form>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
   
    $(document).ready(function() {
    //variables
    var pass1 = $('[name=password]');
    var pass2 = $('[name=password2]');
    var confirmacion = " ✔ Las contraseñas coinciden.";
    var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
    var negacion = "✘ No coinciden las contraseñas.";
    var vacio = "La contraseña no puede estar vacía";
    //oculto por defecto el elemento span
    var span = $('<span></span>').insertAfter(pass2);
    span.hide();
    //función que comprueba las dos contraseñas
    function coincidePassword(){
    var valor1 = pass1.val();
    var valor2 = pass2.val();
    //muestro el span
    span.show().removeClass();
    //condiciones dentro de la función
    if(valor1 != valor2){
    span.text(negacion).addClass('negacion');   
    }
    if(valor1.length==0 || valor1==""){
    span.text(vacio).addClass('negacion');  
    }
    if(valor1.length<6 || valor1.length>10){
    span.text(longitud).addClass('negacion');
    }
    if(valor1.length!=0 && valor1==valor2){
    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
    }
    }
    //ejecuto la función al soltar la tecla
    pass2.keyup(function(){
    coincidePassword();
    });
});


</script>
@endsection
