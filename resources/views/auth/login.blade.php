@extends('layouts.app')

@section('content')
<section >
      <div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/pan11.jpg" class="d-block w-100" alt="..." height="700">
            </div>
          </div>
        </div>
        <form action="login" method="post">@csrf
        <div class="container">
          
          <div>
              <div class="form-area" style="position: absolute; top:55%; left: 80%; transform: translate(-145%, -50%); width: 450px; height: 450px; box-sizing: border-box; border-radius: 20px; background: rgba(155,155,155,0.6); padding: 40px;">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-8 text-center col-sm-12 element-animate">
                          <p class="mb-5" style="color:white; text-transform: uppercase; font-size: 18px;">Inicio de Sesión</p>
                        </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="Correo" required="required" style="height: 40px;" value="{{ old('email') }}">

                     </div>  
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="password" class="form-control" id="contraseña" name="password" required="required" placeholder="Contraseña" style="height: 40px;">
                     </div>  
                    </div>
                      <br>
                        @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Correo o contraseña inválido.</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                    <div class="row">
                      <div class="col-md-2"></div>
                        <div class="col-md-8" align="center">
                            <input type="submit" class="btn btn-success" value="Iniciar Sesion" style=" border:none; outline: none; border-radius: 20px; height: 45px;">
                        </div>
                    </div>

                    <br><p style="text-align: center";><a href="afiliacionCorredor" style="color: black;">Crear una cuenta</a>
                    <br> 
                     @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: black;">
                         ¿Olvidaste la contraseña?
                        </a>
                      @endif
                           
                </div>
          </div>
        </form>

        </div>

      </div>

    </section>
@endsection
