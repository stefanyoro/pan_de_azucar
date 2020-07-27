@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<!-- END slider -->

<section class="section">

	<div class="container" align="center">
		<div class="col-md-12">
			@if(session()->has('data'))
			<div class="alert alert-success" role="alert">
				{{session('data')['mensaje']}}
			</div>
			@endif
			@foreach ( $errors->all() as $error)
			<div class="alert alert-success" role="alert">
				{{$error}}
			</div>
			@endforeach

			<div class="card" style="border-color:#B03A2E; background: transparent;">
				<div class="card-header" style="background-color: #B03A2E;">
					<a style="color: white;">Bancos Receptores</a>
					<button class="btn btn-success" href="/banco/create" data-toggle="modal" data-target="#crear">Crear +</button>


					<!-- Modal -->
					<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="crear" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="crear">Registrar Nuevo Banco Receptor</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<!-- acción del botón  -->
								<form action="/banco" method="post" enctype="multipart/form-data">@csrf
									<div class="modal-body">

										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Titular') }}</label>

													<div class="col-md-6">
														<input id="Titular" type="text" class="form-control @error('Titular') is-invalid @enderror" name="titular" value="{{old('titular')}}" required autocomplete="Titular" autofocus>

														@error('Titular')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Banco') }}</label>

													<div class="col-md-6">
														<select class="form-control" id="banco_id" name="banco_id">
															<!--<option value="" selected disabled>Seleccione </option>-->
															<option selected disabled>Seleccione..</option>
															@foreach(\App\Banco::all() as $banco)
															<option value="{{$banco->id}}">
																{{$banco->nombre}}
															</option>
															@endforeach
															</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

													<div class="col-md-6">
														<input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{old('cedula')}}" required autocomplete="cedula" autofocus>

														@error('cedula')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Cuenta') }}</label>

													<div class="col-md-6">
														<select class="form-control" id="cuenta" name="cuenta">
															<!--<option value="" selected disabled>Seleccione </option>-->
															<option selected disabled>Seleccione..</option>
															<option>Corriente</option>
															<option>Ahorro</option>

															</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nº de Cuenta') }}</label>

													<div class="col-md-6">
														<input id="nrocuenta" type="text" class="form-control @error('nro_cuenta') is-invalid @enderror" name="nro_cuenta" value="{{old('nro_cuenta')}}" required autocomplete="nrocuenta" autofocus>

														@error('nro_cuenta')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

													<div class="col-md-6">
														<input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{old('telefono')}}" required autocomplete="telefono" autofocus>

														@error('telefono')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

													<div class="col-md-6">
														<input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{old('correo')}}" required autocomplete="correo" autofocus>

														@error('correo')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>
												<button class="btn btn-success">Enviar</button>
											</div>
										</div>

									</div>
									<div class="modal-footer">

									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- -->

						<table id="listarbanco" class="table">
							<thead>
								<tr>
									<th>Titular</th>
									<th>Cedula</th>
									<th>Tipo de Cuenta</th>
									<th>NºCuenta</th>
									<th>Teléfono</th>
									<th>correo</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach (\App\BancoReceptor::all() as $clave => $banco)
								<tr>
									<td>{{$banco->titular}}</td>
									<td>{{$banco->cedula}}</td>
									<td>{{$banco->cuenta}}</td>
									<td>{{$banco->nro_cuenta}}</td>
									<td>{{$banco->telefono}}</td>
									<td>{{$banco->correo}}</td>
									<td>
										<button type="button" class="btn btn-outline-warning btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar_{{$banco->id}}">
											<i class="fa fa-pencil" aria-hidden="true"></i>
										</button>
										
										<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#eliminar_{{$banco->id}}">
											<i class="fa fa-trash-o" aria-hidden="true"></i>
										</button>
									</td>

								</tr>

								<!-- Modal Eliminar-->
                                <div class="modal fade" id="eliminar_{{$banco->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModal_{{$banco->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="eliminarModal_{{$banco->id}}">Eliminar...</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
									</div>
								      <form action="{{route('banco.destroy', ['id' => $banco->id] )}}" method="DELETE">@csrf
                                      <!-- acción del botón  -->
                                        <input type="hidden" name="id" value="{{$banco->id}}">
                                          <div class="modal-body">
                                            <h4> ¿Usted está seguro que desea eliminar el banco receptor?</h4>
                                          </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-success" >Si</button>
                                         <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                                        </div>
                                      </form> 
                                    </div>
                                  </div>
								</div>
								
								<!-- Modal editar-->
					<div class="modal fade" id="editar_{{$banco->id}}" tabindex="-1" role="dialog" aria-labelledby="editar_{{$banco->id}}" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="editar_{{$banco->id}}">Modificar Banco Receptor</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<!-- acción del botón  -->
								<form action="/banco/{{$banco->id}}/edit" method="GET" enctype="multipart/form-data">@csrf
									<div class="modal-body">

										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Titular') }}</label>

													<div class="col-md-6">
														<input id="Titular" type="text" class="form-control @error('Titular') is-invalid @enderror" name="titular" value="{{$banco->titular}}" required autocomplete="Titular" autofocus>

														@error('Titular')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Banco') }}</label>

													<div class="col-md-6">
														<select class="form-control" id="banco_id" name="banco_id">
															<!--<option value="" selected disabled>Seleccione </option>-->
															
															@foreach(\App\Banco::all() as $ban)
															<option value="{{$ban->id}}" @if($banco->banco_id == $ban->id) selected @endif>
																{{$ban->nombre}}
															</option>
															@endforeach
															</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>
				
													<div class="col-md-6">
														<input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{$banco->cedula}}" required>
													
														@error('cedula')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Cuenta') }}</label>

													<div class="col-md-6">
														<select class="form-control" id="cuenta" name="cuenta">
															<!--<option value="" selected disabled>Seleccione </option>-->
															
															<option @if($banco->cuenta=='Corriente') selected @endif >Corriente</option>
															
															<option @if($banco->cuenta=='Ahorro') selected @endif >Ahorro</option>
															

															</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nº de Cuenta') }}</label>

													<div class="col-md-6">
														<input id="nrocuenta" type="text" class="form-control @error('nro_cuenta') is-invalid @enderror" name="nro_cuenta" value="{{$banco->nro_cuenta}}" required autocomplete="nrocuenta" autofocus>

														@error('nro_cuenta')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

													<div class="col-md-6">
														<input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$banco->telefono}}" required autocomplete="telefono" autofocus>

														@error('telefono')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

													<div class="col-md-6">
														<input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{$banco->correo}}" required autocomplete="correo" autofocus>

														@error('correo')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>
												<button class="btn btn-success">Enviar</button>
											</div>
										</div>

									</div>
									<div class="modal-footer">

									</div>
								</form>
							</div>
						</div>
					</div>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- -->
				</div>
				<br>
			</div>

		</div>
	</div>



</section>

@endsection
@section('scriptJS')
<!--tabla de listar carreras-->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script>
	$(document).ready(function() {
		//$("#listarcarrera").DataTable();
		var tabla = $("#listarbanco").DataTable({
			"language": {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún dato disponible en esta tabla",
				"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
		});
	});
</script>
@endsection