@extends('layouts.app')

@section('content')

<section class="section">
  <div class="container" align="center">

    <div class="container" align="center">
      <div class="col-md-8">
        <div class="card" style="border-color:#B03A2E; background: transparent;">
          <div class="card-header" style="background-color: #B03A2E; height: 40px;">
              <p  style="color:white; text-align:left;"> Datos de la carrera</p>
          </div>
          <div class="card-body">
            <div class="col-md-12">
              <form action="RegistrarCarrera" method="post" enctype="multipart/form-data">@csrf
                  <div class="row"> 
                    <div class="col-md-12"> 
                      <div class="form-group md-12">
                        <span style="color: red">*</span><i class="fa fa-picture-o" aria-hidden="true"></i>  Imagen publicitaria de la carrera:
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" lang="es" name="foto" accept="image/x-png image/jpeg" pattern="image/x-png image/jpeg" placeholder="Imagen de la publicidad" required="required" data-pattern-error="La foto debe tener el formato .jpeg o .png (imag.png o imag.jpeg por ejemplo)." >
                          <label class="custom-file-label" for="customFileLang" style="text-align:left;">Subir archivo...</label>  
                        </div>    
                      </div>
                    </div> 
                  </div>    
                  <div class="row"> 
                    <div class="col-md-12">    
                      <div class="form-group" align="left">
                        <label>
                          <span style="color: red">*</span><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre de la carrera: 
                        </label>
                        <input type="text" class="form-control" id="nom_carrera" name="nom_carrera" placeholder="Bici Rock Carrizal" data-pattern-error="Debe completar este campo" required="required">
                      </div>  
                      <div class="form-group" align="left">
                        <label for="formGroupExampleInput"><span style="color: red">*</span>
                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                          Lugar de La Carrera:
                        </label> 
                        <input type="text" class="form-control" id="lugar_salida" name="lugar_salida" placeholder="Lugar de Salida" data-pattern-error="Debe completar este campo" required="required">
                        <input type="text" class="form-control" id="lugar_llegada"name="lugar_llegada"  placeholder="Lugar de Llegada" data-pattern-error="Debe completar este campo" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label><span style="color: red;">*</span>
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                          Fecha de la carrera:
                        </label>
                        <input type="date" class="form-control disablecopypaste" name="fecha_carr" placeholder="fecha_carr" min="<?php echo date('Y-m-d'); ?>"  required="El formato debe ser: D-M-A." pattern="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo).">
                      </div>
                    </div>   
                    <div class="col-md-2">
                      <div class="form-group">
                        <label><span style="color: red">*</span>
                          <svg class="bi bi-alarm" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A6 6 0 108 3a6 6 0 000 12zm0 1A7 7 0 108 2a7 7 0 000 14z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v4a.5.5 0 01-.053.224l-1.5 3a.5.5 0 11-.894-.448L7.5 8.882V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                            <path d="M.86 5.387A2.5 2.5 0 114.387 1.86 8.035 8.035 0 00.86 5.387zM11.613 1.86a2.5 2.5 0 113.527 3.527 8.035 8.035 0 00-3.527-3.527z"/>
                            <path fill-rule="evenodd" d="M11.646 14.146a.5.5 0 01.708 0l1 1a.5.5 0 01-.708.708l-1-1a.5.5 0 010-.708zm-7.292 0a.5.5 0 00-.708 0l-1 1a.5.5 0 00.708.708l1-1a.5.5 0 000-.708zM5.5.5A.5.5 0 016 0h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                            <path d="M7 1h2v2H7V1z"/>
                          </svg> Hora:
                        </label>
                        <input type="text" class="form-control hora" id="hora" name="hora" placeholder="00:00" value="" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}" pattern="La hora debe tener el formato 00:00 (01:00 por ejemplo)." required="required">            
                      </div>  
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><span style="color: red">*</span>
                          <svg class="bi bi-brightness-high" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 11a3 3 0 100-6 3 3 0 000 6zm0 1a4 4 0 100-8 4 4 0 000 8zM8 0a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 0zm0 13a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 13zm8-5a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2a.5.5 0 01.5.5zM3 8a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2A.5.5 0 013 8zm10.657-5.657a.5.5 0 010 .707l-1.414 1.415a.5.5 0 11-.707-.708l1.414-1.414a.5.5 0 01.707 0zm-9.193 9.193a.5.5 0 010 .707L3.05 13.657a.5.5 0 01-.707-.707l1.414-1.414a.5.5 0 01.707 0zm9.193 2.121a.5.5 0 01-.707 0l-1.414-1.414a.5.5 0 01.707-.707l1.414 1.414a.5.5 0 010 .707zM4.464 4.465a.5.5 0 01-.707 0L2.343 3.05a.5.5 0 11.707-.707l1.414 1.414a.5.5 0 010 .708z" clip-rule="evenodd"/>
                          </svg> Meridiano:
                        </label>
                        <select class="form-control form-control-lg" id="meridiano" name="meridiano" required="required">
                          <option value="am">am</option>
                          <option value="pm">pm</option>  
                        </select>
                      </div> 
                    </div>
                    <div class="col-md-3">
                      <label class="control-label">
                        <span style="color: red">*</span> 
                        <svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                        </svg>
                        Cupo:
                      </label>
                      <input type="text" class="form-control" id="cupos" name="cupos" pattern='[0-9]{1,30}' data-pattern-error="El cupo sólo puede tener caracteres numéricos" minlength="1" maxlength="3" placeholder="0" required="required">
                    </div>
                  </div>       
                  <div class="row">
                    <div class="col-md-12">
                      <label><span style="color: red">*</span>
                        <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                        Categoria: 
                      </label>
                      <div class="form-group">
                         <div class="form-check form-check-inline">
                           <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Juvenil">
                            <label class="form-check-label" for="Juvenil">Juvenil</label>
                          </div>
                          <div class="form-check form-check-inline">
                           <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Senior">
                            <label class="form-check-label" for="comidad">Senior</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Master-A">
                            <label class="form-check-label" for="bebida">Master-A</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Master-B">
                            <label class="form-check-label" for="bebida">Master-B</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Master-C">
                            <label class="form-check-label" for="bebida">Master-C</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Master-D">
                            <label class="form-check-label" for="bebida">Master-D</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="categoria" name="categoria[]" value="Elite">
                            <label class="form-check-label" for="bebida">Elite</label>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-4">
                      <label  class="control-label"><span style="color: red">*</span><i class="fa fa-bicycle" aria-hidden="true"></i> Modalidad:</label>
                      <select class="form-control form-control-lg" id="modalidad" name="modalidad" required="required" >
                        <option value="Ruta">Ruta</option>
                        <option value="MTB">MTB</option>  
                      </select> 
                    </div> 
                    <div class="col-md-4">
                      <label>
                        <span style="color: red">*</span><i class="fa fa-usd" aria-hidden="true"></i> Costo:
                      </label>
                      <input type="text" class="form-control" id="monto" name="monto" pattern='[0-9]{3,30}' data-pattern-error="El costo sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="000.00" required="required">
                    </div>
                    <div class="col-md-4"> 
                      <label><span style="color: red">*</span>
                        <i class="fa fa-money" aria-hidden="true"></i> 
                        Costo del kit:
                      </label><br>
                      <!--<div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>-->
                      <div class="form-group">
                        <input type="text" class="form-control" id="camisa" name="camisa" pattern='[0-9]{3,30}' data-pattern-error="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" required="required" placeholder="Camisa" required="El valor sólo puede tener caracteres numéricos">
                        
                        <input type="text" class="form-control" id="comida" name="comida" pattern='[0-9]{3,30}' data-pattern-error="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" required="required" placeholder="Comida" required="El valor sólo puede tener caracteres numéricos">    

                        <input type="text" class="form-control" id="bebida" name="bebida" pattern='[0-9]{3,30}' data-pattern-error="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" required="required" placeholder="Hidratacion" required="Elvalor sólo puede tener caracteres numéricos">  
                      </div> 
                    </div>
                  </div>
                </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-6">
                         <input type="submit" class="btn btn-success btn-block py-3" value="Publicar" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
                      </div>
                    </div>
                  </div><br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // para traerme el nombre de la img
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

</script>
@endsection