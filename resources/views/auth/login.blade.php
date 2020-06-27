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

                    <div class="row">
                      <div class="col-md-2"></div>
                        <div class="col-md-8" align="center">
                            <input type="submit" class="btn btn-success" value="Iniciar Sesion" style=" border:none; outline: none; border-radius: 20px; height: 45px;">
                        </div>
                    </div>

                    <p style="text-align: center";><a href="afiliacionCorredor" style="color: black;">Crear una cuenta</a>
                    <br> 
                     
                        <a href="" style="color: black;" data-toggle="modal" data-target="#exampleModal">
                         ¿Olvidaste la contraseña?
                        </a>

                         @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Correo o contraseña inválido.</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                 @if(session()->has('data'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{session('data')['mensaje']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>    
        @endif
                </div>
          </div>
        </form>

        </div>

      </div>

    </section>
    <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #F9C7B8;">
                              <h5 class="modal-title" id="exampleModalLabel">Recuperación de contraseña</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                          <form action="enviarContraseña" method="post">@csrf
                            <div class="col-md-12">
                            <p> <i class="fa fa-envelope-o" aria-hidden="true"></i> Correo electrónico:</p> 
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><br>

                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                          </div>
                        </form>
                        </div>
                      </div>
@endsection
