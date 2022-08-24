<?php

use App\Http\Controllers\EstacionamientoAsignadoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstacionamientoController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/test', function() {
    return view('test');
});

Route::get('/usuarios', [UsuarioController::class, 'vistaUsuarios']);
Route::get('/usuarios/crear', [UsuarioController::class, 'vistaCrearUsuarios']);
Route::get('/usuarios/editar/perfil', [UsuarioController::class, 'vistaEditarPerfil']);
Route::patch('/usuarios/{id}/actualizar/perfil', [UsuarioController::class, 'actualizarPerfil']);
Route::get('/usuarios/modificarContraseña', [UsuarioController::class, 'vistaModificarContraseña']);
Route::post('/usuarios/guardarDatos',[UsuarioController::class, 'guardarUsuarios']);
Route::patch('/usuarios/{id}/actualizarDatos',[UsuarioController::class, 'actualizarUsuarios']);
Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'vistaEditarUsuarios']);

//foo asignar estacionamiento

Route::resource('asignar_estacionamientos',EstacionamientoAsignadoController::class);

Route::get('/usuarios/{id}/estacionamientos',[EstacionamientoAsignadoController::class, 'listaAsignada']);
Route::get('/usuarios/{id}/estacionamientos/asignarEstacionamientos',[EstacionamientoAsignadoController::class, 'asignarEstacionamiento']);
Route::post('/usuarios/{id}/estacionamientos/guardarEstacionamientoAsignado',[EstacionamientoAsignadoController::class, 'GuardarEstacionamiento']);
Route::delete('/usuarios/{id}/estacionamientos/{id_est}/desAsignar', [EstacionamientoAsignadoController::class, 'desasignarEstacionamiento']);


//foo asignar estacionamiento



Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/reportes/pdf', [App\Http\Controllers\ReporteController::class, 'pdf'])->name('reportes.pdf');
Route::get('/comentarios/pdf', [App\Http\Controllers\ComentarioController::class, 'pdf'])->name('comentarios.pdf');

Route::resource('reportes', '\App\Http\Controllers\ReporteController');
Route::resource('comentarios', '\App\Http\Controllers\ComentarioController');
Route::resource('estacionamientos', EstacionamientoController::class);

//aaron actualizar estacionamiento/
Route::post('/updateEstacionamiento', 'App\Http\Controllers\EstacionamientoController@updateEstacionamiento');
Route::post('/ActualizarTurnoAsistencia', 'App\Http\Controllers\EstacionamientoAsignadoController@ActualizarTurnoAsistencia');
Route::get('/ActualizarEstacionamientos/{ID_Usuario}', 'App\Http\Controllers\EstacionamientoController@index2');

Route::get('/ImportDataSet', 'App\Http\Controllers\ImportDataSetController@show');
Route::post('/ImportDataSet/import', 'App\Http\Controllers\ImportDataSetController@store');
Route::post('/ImportDataSet/userimport', 'App\Http\Controllers\ImportDataSetController@userstore');

Route::get('/IndexModerador/{ID_Usuario}', 'App\Http\Controllers\EstacionamientoAsignadoController@IndexModerador');
//aaron actualizar estacionamiento/

Route::get('/navegarmapa', function(){
    return view('navegarmapa.navegarmapa');
});
