<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 
Route::get('/', 'indexController@indexConsulta')->name('indexConsulta');


// Login
	Route::get('InicioSesion', 'Auth\LoginController@ShowLoginForm')->name('InicioSesion');
	Route::post('login', 'Auth\LoginController@login')->name('login');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Recuperación de Contraseñas
	Route::get('password/reset', 'Auth\ResetPasswordController@showResetForm')->name('password/reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password/reset');
	Route::get('password/confirm', 'Auth\ResetPasswordController@confirm')->name('password/confirm');

//Contraseñas
	Route::get('recuperarContraseña', 'ContraseñaController@recuperarContraseña')->name('recuperarContraseña');

// Funciones del Administrador:
	Route::get('registroUsuario', 'AdministradorController@vistaRegistroUsuario')->name('registroUsuario');
	Route::post('RegistrarUsuario', 'AdministradorController@RegistrarUsuario')->name('RegistrarUsuario');
	Route::get('listadoUsuarios', 'AdministradorController@listadoUsuarios')->name('listadoUsuarios');
	Route::get('cambiarContraseña', 'AdministradorController@recuperarContraseña')->name('cambiarContraseña');
	Route::post('enviarContraseña', 'AdministradorController@enviarContraseña')->name('enviarContraseña');
	Route::post('eliminarUsuario', 'AdministradorController@eliminarUsuario')->name('eliminarUsuario');
	Route::post('cambiarContraseña', 'AdministradorController@cambiarContraseña')->name('cambiarContraseña');

// Módulo de Corredores:
	Route::get('afiliacionCorredor', 'CorredorController@vistaRegistroCorredor')->name('afiliacionCorredor');
	Route::get('registroExitoso', 'CorredorController@vistaRegistroExitoso')->name('registroExitoso');
	Route::post('RegistrarCorredor', 'CorredorController@RegistrarCorredor')->name('RegistrarCorredor');
	Route::get('verPerfil', 'CorredorController@verPerfil')->name('verPerfil');
	Route::get('vistaModificarPerfil', 'CorredorController@vistaModificarPerfil')->name('vistaModificarPerfil');
	Route::post('actualizarPerfil', 'CorredorController@actualizarPerfil')->name('actualizarPerfil');

//Registro de carrera
	//Registro de carrera
	Route::get('aperturaCarreras', 'CarreraController@registroCarrera')->name('aperturaCarreras'); 
	//Route::get('consultaCarrera', 'CarreraController@consultaCarrera')->name('consultaCarrera');
	Route::post('RegistrarCarrera', 'CarreraController@RegistrarCarrera')->name('RegistrarCarrera');
	Route::get('consultaCarrera/{id}', 'CarreraController@consultaCarrera')->name('consultaCarrera');
	Route::get('listarCarrera', 'CarreraController@listarCarrera')->name('listarCarrera');
	Route::post('listarCarrera', 'CarreraController@listarCarrera')->name('listarCarrera');
	Route::post('modificarCarrera', 'CarreraController@modificarCarrera')->name('modificarCarrera');
	Route::post('eliminarCarrera', 'CarreraController@eliminarCarrera')->name('eliminarCarrera');
	Route::get('listadoPDF/{id}', 'CarreraController@listadoPDF')->name('listadoPDF');

// Incripción de Corredores

	Route::get('inscripcionCorredores/{id}', 'InscripcionCorredoresController@inscripcioncorredores');
	Route::post('guardarInscripcionCorredores', 'InscripcionCorredoresController@guardarInscripcionCorredores')->name('guardarInscripcionCorredores');
	Route::get('listadoCorredores', 'InscripcionCorredorescontroller@listadoCorredores')->name('listadoCorredores');
	Route::post('supenderCorredor', 'InscripcionCorredoresController@supenderCorredor');
	Route::post('modificarPago', 'InscripcionCorredoresController@modificarPago');
	Route::get('recibo/{id}', 'InscripcionCorredorescontroller@recibo')->name('recibo');
	Route::get('verificarPago', 'InscripcionCorredorescontroller@verificarPago')->name('verificarPago');
	Route::post('comprobarPago', 'InscripcionCorredorescontroller@comprobarPago')->name('comprobarPago');
	Route::get('carreraDisponible', 'InscripcionCorredorescontroller@carreraDisponible')->name('carreraDisponible');
	Route::post('observacion', 'InscripcionCorredoresController@observacion');
	Route::get('numero/{id}', 'InscripcionCorredorescontroller@numero')->name('numero');
// Plan de entrenamientos
	Route::get('planEntrenamiento', 'PlanEntrenamientoController@vistaRegistroEntrenamiento')->name('planEntrenamiento');
	Route::post('RegistrarPlanE','PlanEntrenamientoController@RegistrarPlanE')->name('RegistrarPlanE');
	Route::get('nuevoEjercicio', 'PlanEntrenamientoController@nuevoEjercicio')->name('nuevoEjercicio');
	Route::post('RegistrarEjercicio', 'PlanEntrenamientoController@RegistrarEjercicio')->name('RegistrarEjercicio');
	Route::get('listaEjercicios', 'PlanEntrenamientoController@listaEjercicio')->name('listaEjercicios');
	Route::post('modificarEjercicio', 'PlanEntrenamientoController@modificarEjercicio')->name('modificarEjercicio');
	Route::post('eliminarEjercicio', 'PlanEntrenamientoController@eliminarEjercicio')->name('eliminarEjercicio');
	Route::get('miEntrenamiento', 'PlanEntrenamientoController@miEntrenamiento')->name('miEntrenamiento');
	Route::get('listadoPlanesEntrenamiento', 'PlanEntrenamientoController@listadoPlanesEntrenamiento')->name('listadoPlanesEntrenamiento');

// Resultados de carreras
	Route::get('resultadosCarreras', 'ResultadosController@registroResultados')->name('resultadosCarreras');
	Route::post('resultadosCarreras', 'ResultadosController@RegistrarResultados')->name('resultadosCarreras');


	Route::get('verResultados', 'ResultadosController@verResultados')->name('verResultados');
	Route::get('/home', 'HomeController@index')->name('home');

//PDF'S
	Route::get('CarnetPDF', 'PdfController@carnet')->name('CarnetPDF');
	Route::get('planBasicoPDF', 'PdfController@planBasico')->name('planBasicoPDF');
//Banco Receptor
	Route::resource('banco', 'BancoController');

	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
