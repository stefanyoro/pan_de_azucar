@extends('layouts.app')

@section('content')

<section class="section" style="background-color:#DBDBDB;">
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
                          <div class="form-group">
                            <div class="form-group md-12">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="foto" lang="es" name="foto" accept="image/x-png image/jpeg" placeholder="Imagen de la publicidad" required="required">
                                  <label class="custom-file-label" for="customFileLang"></label>  
                              </div>    
                            </div>
                          </div> 
                        
                        <div class="row"> 
                        <div class="col-md-12">    
                          <div class="form-group">
                              <label>
                                <span class="red">*</span><i class="fa fa-flag-checkered" aria-hidden="true"></i> Nombre de la carrera: 
                              </label>
                              <input type="text" class="form-control" id="nom_carrera" name="nom_carrera" placeholder="Bici Rock Carrizal" required="required">
                           </div>  
                            <div class="form-group">
                              <label for="formGroupExampleInput"><span class="red">*</span>
                                <svg class="bi bi-geo-alt" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 002 6c0 4.314 6 10 6 10zm0-7a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                </svg> 
                                Lugar de La Carrera:
                              </label> 
                              <input type="text" class="form-control" id="lugar_salida" name="lugar_salida" placeholder="Lugar de Salida" required="required">
                              <input type="text" class="form-control" id="lugar_llegada"name="lugar_llegada"  placeholder="Lugar de Llegada" required="required">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                          <div class="col-md-12"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label><span class="red">*</span>
                                  <svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                  </svg>
                                  Fecha de la carrera:
                                </label>
                                <input type="date" class="form-control disablecopypaste" name="fecha_carr" placeholder="fecha_carr" min="2020-01-01" title="El formato debe ser: D-M-A." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)." required="required">
                              </div>
                            </div>   
                            <div class="col-md-2">
                              <div class="form-group">
                                <label><span class="red">*</span>
                                    <svg class="bi bi-alarm" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 15A6 6 0 108 3a6 6 0 000 12zm0 1A7 7 0 108 2a7 7 0 000 14z" clip-rule="evenodd"/>
                                      <path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v4a.5.5 0 01-.053.224l-1.5 3a.5.5 0 11-.894-.448L7.5 8.882V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                      <path d="M.86 5.387A2.5 2.5 0 114.387 1.86 8.035 8.035 0 00.86 5.387zM11.613 1.86a2.5 2.5 0 113.527 3.527 8.035 8.035 0 00-3.527-3.527z"/>
                                      <path fill-rule="evenodd" d="M11.646 14.146a.5.5 0 01.708 0l1 1a.5.5 0 01-.708.708l-1-1a.5.5 0 010-.708zm-7.292 0a.5.5 0 00-.708 0l-1 1a.5.5 0 00.708.708l1-1a.5.5 0 000-.708zM5.5.5A.5.5 0 016 0h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                      <path d="M7 1h2v2H7V1z"/>
                                    </svg> Hora:
                                  </label>
                                  <input type="text" class="form-control hora" id="hora" name="hora" placeholder="00:00" value="" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}" required="required">            
                                </div>  
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label><span class="red">*</span>
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
                                <label><span class="red">*</span><i class="fa fa-usd" aria-hidden="true"></i> Costo:</label>
                                <input type="text" class="form-control" id="monto" name="monto" pattern='[0-9]{3,30}' title="El monto sólo puede tener caracteres numéricos" minlength="3" maxlength="12" placeholder="000.00" required>
                              </div>
                          </div>
                         </div>
                         </div> 
                          <div class="row"> 
                            <div class="col-md-12"></div>
                              <div class="col-md-4">
                                <label><span class="red">*</span>
                                  <svg class="bi bi-bookmark" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 12l5 3V3a2 2 0 00-2-2H5a2 2 0 00-2 2v12l5-3zm-4 1.234l4-2.4 4 2.4V3a1 1 0 00-1-1H5a1 1 0 00-1 1v10.234z" clip-rule="evenodd"/>
                                  </svg>Categoria:
                                </label>
                                <select class="form-control form-control-lg" id="categoria" name="categoria" required="required">
                                  <option value="Juvenil">Juvenil</option>
                                  <option value="Senior">Senior</option>  
                                  <option value="Master-A">Master-A</option>
                                  <option value="Master-B">Master-B</option>
                                  <option value="Master-C">Master-C</option>
                                </select> 
                              </div> 
                              <div class="col-md-2"> 
                                <label><span class="red">*</span>
                                  <svg class="bi bi-check-box" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 003 14.5h10a1.5 1.5 0 001.5-1.5V8a.5.5 0 00-1 0v5a.5.5 0 01-.5.5H3a.5.5 0 01-.5-.5V3a.5.5 0 01.5-.5h8a.5.5 0 000-1H3A1.5 1.5 0 001.5 3v10z" clip-rule="evenodd"/>
                                  </svg> Kit:
                                </label>
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
                                <label><span class="red">*</span><i class="fa fa-bicycle" aria-hidden="true"></i> Modalidad:</label>
                                <select class="form-control form-control-lg" id="modalidad" name="modalidad" required="required" >
                                  <option value="Ruta">Ruta</option>
                                  <option value="MTB">MTB</option>  
                                </select> 
                              </div> 
                              
                              <div class="col-md-2">
                                <label>
                                  <span class="red">*</span> 
                                  <svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                                  </svg>
                                  Cupo:
                                </label>
                                <input type="text" class="form-control" id="cupos" name="cupos" pattern='[0-9]{1,30}' title="El monto sólo puede tener caracteres numéricos" minlength="1" maxlength="3" placeholder="0" required>
                              </div>
                            </div>
                          </div> 
                        </div><br>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-6">
                               <input type="submit" class="btn btn-success btn-block py-3" value="Guardar" style=" border:none; outline: none; border-radius: 20px; height: 50px; width: 150px;">
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
@endsection