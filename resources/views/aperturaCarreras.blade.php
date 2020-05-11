@extends('layouts.app')

@section('content')

      
      <!--<div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="mb-5"><img src="img/pan5.jpg" alt="" class="img-fluid"></p>
          </div> -->
<section class="section" style="background-color: #839192;">
  <div class="container" align="center">

    <div class="container" align="center">
      <div class="col-md-8">
        <div class="card" style="border-color:#B03A2E; background: transparent;">
          <div class="card-header" style="background-color: #B03A2E; height: 40px;">
           <p  style="color:white; text-align:left;"> Datos de la carrera</p> 
          </div>
          <div class="card-body">
            <div class="">
                    <form action="RegistrarCarrera" method="post">@csrf
                        <div class="row"> 
                            <div class="col-md-12"> 
                              <div class="form-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="es"><label class="custom-file-label" for="customFileLang">Imagen de la publicidad</label>
                                   </div>
                                   
                                   <div class="form-group"><label><span class="red">*</span>Nombre de la carrera:</label><input type="text" class="form-control" id="nombre1" name="nombre1" pattern='[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}' title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="40" placeholder="Bici Rock Carrizal" required></div>
                          

                                   <div class="form-group"><label for="formGroupExampleInput"><span class="red">*</span>Lugar de La Carrera:</label> <input type="text" class="form-control" id="salida" placeholder="Lugar de Salida" required></div>
                                   <div><input type="text" class="form-control" id="llegada" placeholder="Lugar de Llegada" required></div>

                                      </div>
                                        <div class="row">
                                          <div class="col-md-1">
                                            </div>
                                            <div class="col-md-4">
                                               <div class="form-group">
                                                  <label><span class="red">*</span>Fecha de la carrera:</label>
                                                  <input type="date" class="form-control" id="fecha_carrera" name="fecha_carrera" placeholder="" title="El formato debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)." required>
                                                </div>
                                            </div>          
                                            <div class="col-md-3">
                                               <div class="form-group">
                                                 <label><span class="red">*</span>Hora:</label><input type="text" class="form-control hora" id="hora_desayuno" name="hora_desayuno" placeholder="00:00" value="" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                              <label><span class="red">*</span>Modalidad:</label>
                                              <select class="form-control form-control-lg" id="modalidad" placeholder="ninguno" required>
                                                <option>Ruta</option>
                                                <option>MT</option>  
                                              </select> 
                                            </div> 
                                          </div>
                                          <div class="row"> 
                                            <div class="col-md-1"></div>
                                              <div class="col-md-4">
                                                <label><span class="red">*</span>Categoria:</label>
                                                 <select class="form-control form-control-lg" id="categoria" placeholder="ninguno"required>
                                                    <option>Juvenil</option>
                                                    <option>Senior</option>  
                                                    <option>Master-A</option>
                                                    <option>Master-B</option>
                                                    <option>Master-C</option>
                                                  </select> 
                                               </div> 
                                              <div class="col-md-3">
                                                <label><span class="red">*</span>Kit de Carrera:</label>
                                                <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="kit">
                                                  <label class="form-check-label" for="camisa">Camisa</label><br>
                                                  <input type="checkbox" class="form-check-input" id="kit">
                                                  <label class="form-check-label" for="comidad">Comida</label><br>
                                                  <input type="checkbox" class="form-check-input" id="kit">
                                                  <label class="form-check-label" for="bebida">Bebida</label>
                                                </div>
                                              </div>
                                              <div class="col-md-4">
                                                <label><span class="red">*</span>Costo de la Carrera:</label>
                                                <input type="text" class="form-control" id="monto" name="monto" pattern='[0-9]{3,30}' title="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="40" placeholder="000.00" required></div>
                                              </div>
                                            </div> <br><br>
                                            </div><br>
                                                <div class="row">
                                                      <div class="col-md-12">
                                                        <input type="submit" class="btn btn-primary btn-block py-3" value="Publicar" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
                                                      </div>
                                            </div>
                                          </div><br>
                                          </div>                   
                                        </div>
                                      </form>

                  </form>
                  </div>
          </div>
      </div>
    </div>
    </div>
</div>
</section>
    @endsection