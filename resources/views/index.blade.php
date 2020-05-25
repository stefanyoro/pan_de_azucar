@extends('layouts.app')

@section('content')
	 <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url('img/pan1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <p class="mb-5" style="font-style: italic;">“No puedes ser bueno quedándote en casa. Si quieres volverte rápido, tienes que ir donde están los chicos rápidos.”</p>
              <p style="text-align:right;font-family:Latin Modern Roman; font-style: italic;">Steve Larsen.</p>
              @guest
              <p><a href="InicioSesion" class="btn btn-white btn-outline-white">Inicia Sesión</a>
              @endguest
            </div>
          </div>
        </div>

      </div>

      <div class="slider-item" style="background-image: url('img/pan2.jpg');">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1></h1>
               <p class="mb-5" style="font-style: italic;">"Ganar tiene que ver con el corazón, no sólo con las piernas. Se tiene que estar en el lugar correcto".</p>
              <p style="text-align:right;font-family:Latin Modern Roman; font-style: italic;">Lance Armstrong.</p>

               @guest
              <p><a href="InicioSesion" class="btn btn-white btn-outline-white">Inicia Sesión</a>
              @endguest
            </div>
          </div>
        </div>
        
      </div>

    </section>
    <!-- END slider -->

    <section class="section element-animate">

      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Equipo</h2>
              <span class="back-text">Equipo</span>
            </div>
          </div>
        </div>
      </div>
        <div class="container">
          <div class="row">
            <div class="major-caousel js-carousel-1 owl-carousel">
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="#"><img src="img/equipo1.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Álvaro Linares</h3>
                    <p class="lead">Corredor</p>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="#"><img src="img/equipo2.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Raúl Ceballo</h3>
                    <p class="lead">Corredor</p>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="#"><img src="img/equipo3.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Jorge Inciarte</h3>
                    <p class="lead">Corredor</p>
                  </div>
                </div>
              </div>
            </div>
          <!-- END slider -->
           </div>
        </div>
      
    </section> <!-- .section -->
    <section class="section bg-light element-animate">

      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Carreras</h2>
              <span class="back-text-dark">Carreras</span>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row no-gutters">
          @foreach ($carreras as $clave => $carrera)
           @if ($carrera->estatus == 1)
          <div class="col-md-6">
            <div class="sched d-block d-lg-flex">
              <div class="bg-image order-2" style="background-image: url('img/pan6.jpg'); height: 22vw;"></div>
                <div class="text order-1">                
                  <h3><!--{{ $clave + 1}}º<p style="text-indent: 05%;"> Carrera -->{{ $carrera->nom_carrera}}</p></h3>
                  <p>El lugar de salida sera, {{ $carrera->lugar_salida}} y la meta final sera {{ $carrera->lugar_llegada}}.</p>
                  <p class="sched-time">
                    <span><span class="fa fa-clock-o"></span> {{ $carrera->hora}}{{ $carrera->meridiano}}</span> <br>
                    <span><span class="fa fa-calendar"></span> {{ $carrera->fecha_carr}}</span> <br>
                    <span><span class="fa fa-bicycle"></span> {{ $carrera->modalidad}}</span> <br>
                    <p style="text-align: right;"><span>Cupos Disponibles: {{ $carrera->cupos}}</span></p>
                    <p align="right"><a href="carrera.html" class="btn btn-success btn-sm">Inscribete</a></p>
                  </p>
                 
                </div>              
            </div>
          </div> 
          @endif
          @endforeach 

            <!--<div class="sched d-block d-lg-flex">
              <div class="bg-image" style="background-image: url('img/pan6.jpg');"></div>
              <div class="text">
                <h3>2º carrera</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                <p class="sched-time">
                  <span><span class="fa fa-clock-o"></span> 5:30 PM</span> <br>
                  <span><span class="fa fa-calendar"></span> febrero 22, 2020</span> <br>
                  <p><a href="carrera.html" class="btn btn-primary btn-sm">Inscribete</a></p>
                </p>
                
              </div>  
            </div>


          <div class="col-md-6">
            <div class="sched d-block d-lg-flex">
              <div class="bg-image order-2" style="background-image: url('img/imagen4.jpg');"></div>
              <div class="text order-1">
                <h3>3º carrera</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                  <span><span class="fa fa-clock-o"></span> 5:30 PM</span> <br>
                  <span><span class="fa fa-calendar"></span> marzo 22, 2020</span> <br><p><a href="carrera.html" class="btn btn-primary btn-sm">Inscribete</a></p>
                <p class="sched-time">
                </p>                
              </div>   
            </div>

            <div class="sched d-block d-lg-flex">
              <div class="bg-image" style="background-image: url('img/imagen5.jpg');"></div>
              <div class="text">
                <h3>4º carrera</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus...</p>
                <p class="sched-time">
                  <span><span class="fa fa-clock-o"></span> 5:30 PM</span> <br>
                  <span><span class="fa fa-calendar"></span> Abril 22, 2020</span> <br>
                  <p><a href="carrera.html" class="btn btn-primary btn-sm">Inscribete</a></p>
                </p>
              </div>
              
            </div>
          </div>-->
        </div>
        
      </div>
</section> <!-- .section -->
 
@endsection
