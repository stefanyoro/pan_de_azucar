@extends('layouts.app')
 
@section('content')

    <!-- END slider -->
    <section class="section" style="background-color: #839192;">
    <div class="container" align="center">
      <div class="col-md-12">
        <div class="card" style="border-color:black; background: transparent;">
          <div class="card-header" style="background-color: #B03A2E;">
            
          </div>
          <div class="card-body">
            <div class="">
                    <form action="Resultados" method="post">@csrf
                        <div class="row">
                            <div class="col-md-12"> 
                              <div class="form-group">
                        
      
                      <div class="col-md-3">
                        <select class="form-control" id="tipo_doc" style="height: 45px;">
                          <option>Carreras finalizadas</option>
                          <option>I Válida Gatorade</option>
                          <option>Caracas Bici Rock</option>
                          <option>Ellas 10K</option>
                        </select>
                      </div>
                  </div><br>

                  <div class="row">
                      <div class="col-md-12"> 
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Posición</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Tiempo</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Fausto</td>
                                <td>Coppi</td>
                                <td>V.- 18.740.890</td>
                                <td>Senior</td>
                                <td>1:10:02</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Nairo</td>
                                <td>Quintana</td>
                                <td>V.- 20.675.392</td>
                                <td>Master</td>
                                <td>1:20:18</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Gino</td>
                                <td>Bartali</td>
                                <td>V.- 18.091.487</td>
                                <td>Master C</td>
                                <td>1:25:09</td>
                              </tr>
                            </tbody>
                          </table>
                      </div>  
                  </div><br>
               
               
                <div class="col-md-4" align="center">
              <input type="submit" class="btn btn-primary btn-block py-3" value="Publicar" style=" border:none; outline: none; border-radius: 20px; height: 45px;">
          </div>
                </form>
              </div>
            </div>
          </div>
      </div>

   
   
       </section>

@endsection