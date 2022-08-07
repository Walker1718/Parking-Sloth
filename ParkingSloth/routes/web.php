<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/test', function() {
    return view('test');
});

Route::get('/usuarios', [UsuarioController::class, 'vistaUsuarios']);
Route::get('/usuarios/crear', [UsuarioController::class, 'vistaCrearUsuarios']);
Route::get('/usuarios/{id}/perfil', [UsuarioController::class, 'vistaVerPerfil']);
Route::get('/usuarios/modificarContraseña', [UsuarioController::class, 'vistaModificarContraseña']);
Route::post('/usuarios/guardarDatos',[UsuarioController::class, 'guardarUsuarios']);
Route::patch('/usuarios/{id}/actualizarDatos',[UsuarioController::class, 'actualizarUsuarios']);
Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'vistaEditarUsuarios']);

Route::get('/home', function () {
    return view('home');
});

Route::resource('reportes', '\App\Http\Controllers\ReporteController');

Route::get('/navegarmapa', function(){
    return view('navegarmapa.navegarmapa');
});
