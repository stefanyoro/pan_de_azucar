<!doctype html>
<html lang="en">
  <head>
    <title>Pan de Azucar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logotipo.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
  
    @yield('css')
  </head>
  <body>
  
 <header role="banner">
    @if (Request::is('/'))
    @else
      <style>
        header .navbar .nav-link{
              color: black !important;
            }
      </style>
    @endif
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          
          <a class="navbar-brand" href="/">
          @if (Request::is('/'))   
            <img src="{{ asset('img/logotipo1.png')}}" style=" bottom:12px; display: inline-block; vertical-align: middle; width: 80px;">
          @else
            <img src="{{ asset('img/logotipo.png')}}" style=" bottom:12px; display: inline-block; vertical-align: middle; width: 80px;"> 
          @endif
          </a>
  
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav mr-auto pl-lg-5 pl-0">
           @guest
            <ul class="navbar-nav ml-auto">
            </ul>
           
           @else
              <li class="nav-item">
                
              </li>
              @if(Auth::user()->rol == '1')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="{{ route('registroUsuario') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar usuario</a>
                  <a class="dropdown-item" href="{{ route('listadoUsuarios') }}"><i class="fa fa-server" aria-hidden="true"></i> Listado de usuarios</a>
                </div>
              </li> 
              @endif
              @if(Auth::user()->rol == '1')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carreras</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">                  
                  <!--<a class="dropdown-item" href="resultadosCarreras"><i class="fa fa-table" aria-hidden="true"></i> Registrar resultados</a>-->
                  <a class="dropdown-item" href="{{ route('aperturaCarreras') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Apertura de carrera</a>
                  <a class="dropdown-item" href="{{ route('listarCarrera') }}"><i class="fa fa-list" aria-hidden="true"></i> Listado de carreras</a>
                  <a class="dropdown-item" href="{{ route('listadoCorredores') }}"><i class="fa fa-ticket" aria-hidden="true"></i> Corredores inscritos</a>
                  <a class="dropdown-item" href="{{ route('verificarPago') }}"><i class="fa fa-list" aria-hidden="true"></i> Verificar corredores</a>
                  @if(Auth::user()->rol == '4')
                  <a class="dropdown-item" href="{{ route('InscripcionCorredores') }}"><i class="fa fa-ticket" aria-hidden="true"></i> Inscripción de la carrera</a>
                  @endif
                  
                  
                </div>
              </li>
              @endif
              @if(Auth::user()->rol == '4')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carreras</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="{{ route('carreraDisponible') }}"><i class="fa fa-check-square" aria-hidden="true"></i> Carreras disponibles</a>
                  <a class="dropdown-item" href="{{ route('listadoCorredores') }}"><i class="fa fa-list-ol" aria-hidden="true"></i> Mis inscripciones</a>
                </div>
              </li>
              @endif
              @if(Auth::user()->rol == '4')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="services.html"><i class="fa fa-apple" aria-hidden="true"></i> Mis planes alimenticios</a>
                  <a class="dropdown-item" href="miEntrenamiento"><i class="fa fa-bicycle" aria-hidden="true"></i> Mis planes de entrenamiento</a>
                </div>
              </li>
              @endif

              @if(Auth::user()->rol == '2')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plan de entrenamiento</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="planEntrenamiento">Creación de plan</a>
                  <a class="dropdown-item" href="listadoPlanesEntrenamiento">Listado de planes creados</a>
                </div>
                @endif
                @if(Auth::user()->rol == '2')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicios</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="nuevoEjercicio">Agregar nuevo ejercicio</a>
                  <a class="dropdown-item" href="listaEjercicios">Lista de ejercicios</a>
                </div>
              </li>
              @endif
              @if(Auth::user()->rol == '3')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plan de alimentación</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="services.html">Creación de plan</a>
                  <a class="dropdown-item" href="planEntrenamiento">Listado de planes creados</a>
                </div>
              </li>
              @endif
              @if((Auth::user()->rol == '1'))
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Resultados</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">                   
                  <a class="dropdown-item" href="{{ route('resultadosCarreras') }}"><i class="fa fa-table" aria-hidden="true"></i> Registro de resultados</a>
                  <a class="dropdown-item" href="{{ route('verResultados1') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>  Publicación de resultados<a>
                  <!--<a class="dropdown-item" href="verResultados1"> Resultados</a>-->
                </div>         
              </li>
              @endif
              @if((Auth::user()->rol == '4'))
              <li class="nav-item ">
                  <a class="nav-link" href="{{ route('verResultados1') }}">Resultados</a>                       
              </li>
              @endif
            </ul>
           @endguest
        
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                          <ul class="navbar-nav ml-auto ">
                          <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if((Auth::user()->rol == '1') or (Auth::user()->rol == '2'))
                                  @if(App\Inscribir::where('estatus', 1)->count() == 0)
                                  <span class="fa fa-bell-slash-o fa-2x"></span>
                                  @else
                                  <span class="fa fa-bell fa-2x"></span>
                                  @endif
                                @endif

                                @if(Auth::user()->rol == '4')
                                  @if((App\Inscribir::where('corredor_id',Auth::user()->corredor->id)->where('estatus_corredor', 0)->count() !== 0) or (App\Inscribir::where('corredor_id',Auth::user()->corredor->id)->where('observacion', null)->count() !== 0))
                                  <span class="fa fa-bell fa-2x"></span>
                                  @else
                                  <span class="fa fa-bell-slash-o fa-2x"></span>
                                  @endif
                                @endif

                                </a>

                                <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                            @if(Auth::user()->rol == '1')
                                @if(App\Inscribir::where('estatus', 1)->where('observacion', null)->count() == 0)
                                    <a class="dropdown-item" href="#">No hay nada para mostrar</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('verificarPago') }}">Pagos por verificar: {{App\Inscribir::where('estatus', 1)->where('observacion', null)->count()}}</a>
                                @endif
                            @endif
                            @if(Auth::user()->rol == '4')
                              @if(App\Inscribir::where('corredor_id',Auth::user()->corredor->id)->where('estatus_corredor', 0)->count() !== 0)

                              @foreach(App\Inscribir::where('corredor_id',Auth::user()->corredor->id)->where('estatus_corredor', 0)->get() as $verificaciones)
                                <a class="dropdown-item" href="{{ route('listadoCorredores') }}">Pago verificado de la carrera {{$verificaciones->carrera->nom_carrera}}</a>
                              @endforeach
                            

                            

                              @else
                                 <a class="dropdown-item" href="#">No hay nada para mostrar</a>
                              @endif
                            @endif

                                  </div>
                            </li>
                          </ul>
                         <ul class="navbar-nav ml-auto">
                          <img src="{{\Storage::url(Auth::user()->img)}}" class="rounded-circle" alt="..." style=" position: relative; bottom: -17px;  height: 35px; width: 35px; ">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="verPerfil"> 
                                    <svg class="bi bi-person-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                                      <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                    </svg>
                                     Ver perfil
                                  </a>
                                  <a class="dropdown-item" href="vistaModificarPerfil"> 
                                    <svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd"/>
                                    </svg>
                                     Modificar perfil
                                  </a>
                                  @if(Auth::user()->rol == '1')
                                  <a class="dropdown-item" href="/banco"> 
                                    <i class="fa fa-bank" aria-hidden="true"></i>
                                     Banco receptor
                                  </a>
                                  @endif
                                  <a class="dropdown-item" href="cambiarContraseña"> 
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                     Contraseña
                                  </a>

                                  <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    <div>
      @yield('content')
    </div>
    <!-- chat whatsapp-->
    <div class="btn-whatsapp">
      <a href="https://api.whatsapp.com/send?phone=584123617542&text=Hola!&nbsp;me&nbsp;pueden&nbsp;asesorar?&lang=es" target="_blank">
        <img src="{{ asset('img/whatsappIcon.png')}}" alt="whatsapp">  
      </a>
    </div>
    <!-- footer-->
    <footer class="site-footer" role="contentinfo">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 mb-5">
            <h3>Bike Team</h3>
            <p class="mb-5">Grupo de ciclistas entusiastas fundado en el año 2015.</p>
            <ul class="list-unstyled footer-link d-flex footer-social">
              <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <li><a href="https://www.instagram.com/pandeazucarbiketeam/" class="p-2"><span class="fa fa-instagram"></span></a></li>
            </ul>

          </div>
          <div class="col-md-5 mb-5">
            <h3>Contacto</h3>
            <ul class="list-unstyled footer-link">
              <li class="d-block">
                <span class="d-block">Dirección:</span>
                <span class="text-white">Urbanización pan de azúcar montaña alta, carrizal.</span></li>
              <li class="d-block"><span class="d-block">Telefono:</span><span class="text-white">+58 4123084838</span></li>
              <li class="d-block"><span class="d-block">Correo:</span><span class="text-white">pandeazucarteam@gmail.com</span></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Accesos</h3>
            <ul class="list-unstyled footer-link">
              <li><a href="app">Inicio</a></li>
              <li><a href="#">Carreras</a></li>
              <li><a href="verResultados">Resultados</a></li>
            </ul>
          </div>

        </div>
        <div class="row">
          <div class="col-12 text-md-center text-left">
            <p> Copyright &copy; 2019. Informática trayecto III. </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- END footer -->

    <!-- loader -->
    <!-- <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
-->

    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>

    <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('js/magnific-popup-options.js')}}"></script>
    

    <script src="js/main.js"></script>

    @yield('scriptJS')
  </body>
</html>