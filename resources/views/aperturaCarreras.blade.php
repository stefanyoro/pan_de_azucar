@extends('layouts.app')

@section('content')

      
      <!--<div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="mb-5"><img src="img/pan5.jpg" alt="" class="img-fluid"></p>
          </div> -->
<section class="section" style="background-color:#DBDBDB;">
  <div class="container" align="center">

    <div class="container" align="center">
      <div class="col-md-8">
        <div class="card" style="border-color:#B03A2E; background: transparent;">
          <div class="card-header" style="background-color: #B03A2E; height: 40px;">
           <p  style="color:white; text-align:left;"> Datos de la carrera</p>
          </div>
          <div class="card-body">
            <div class="">
              <form action="RegistrarCarrera" method="post" enctype="multipart/form-data">@csrf
                    <div class="row"> 
                        <div class="col-md-12"> 
                          <div class="form-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="foto" accept="image/x-png, image/jpeg">
                                <label class="custom-file-label" for="customFileLang"required="required">Imagen de la publicidad</label>  
                               </div>
                               
                              <div class="form-group">
                                <label>
                                  <span class="red">*</span>Nombre de la carrera:
                                </label>
                                <input type="text" class="form-control" id="nom_carrera" name="nom_carrera" placeholder="Bici Rock Carrizal" required="required">
                              </div>
                      

                               <div class="form-group"><label for="formGroupExampleInput"><span class="red">*</span>Lugar de La Carrera:</label> 
                                <input type="text" class="form-control" id="lugar_salida" name="lugar_salida" placeholder="Lugar de Salida" required="required"></div>
                               <div>
                                <input type="text" class="form-control" id="lugar_llegada"name="lugar_llegada"  placeholder="Lugar de Llegada" required="required"></div>

                                  </div>
                                    <div class="row">
                                      <div class="col-md-1">
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                              <label><span class="red">*</span>Fecha de la carrera:</label>
                                              <input type="date" class="form-control" name="fecha_carr" placeholder="" title="El formato debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)." required="required">
                                            </div>
                                        </div>          
                                        <div class="col-md-4">
                                           <div class="form-group">
                                             <label><span class="red">*</span>Hora:</label><input type="text" class="form-control hora" id="hora" name="hora" placeholder="00:00" value="" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                          <label><span class="red">*</span>Modalidad:</label>
                                          <select class="form-control form-control-lg" id="modalidad" name="modalidad" required="required">
                                            <option value="Ruta">Ruta</option>
                                            <option value="MTB">MTB</option>  
                                          </select> 
                                        </div> 
                                      </div>
                                      <div class="row"> 
                                        <div class="col-md-1"></div>
                                          <div class="col-md-4">
                                            <label><span class="red">*</span>Categoria:</label>
                                             <select class="form-control form-control-lg" id="categoria" name="categoria" required="required">
                                                <option value="Juvenil">Juvenil</option>
                                                <option value="Senior">Senior</option>  
                                                <option value="Master-A">Master-A</option>
                                                <option value="Master-B">Master-B</option>
                                                <option value="Master-C">Master-C</option>
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
                                                    <div class="col-md-6">
                                                      <input type="submit" class="btn btn-success btn-block py-3" value="Guardar" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
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