<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
    return view('test');
});
Route::get('/admin', function () {
    return view('layouts.admin');
});


// Route::get('/estacionamientos', function() {
//     return view('estacionamientos.create');
// });

Route::resource('estacionamientos', EstacionamientoController::class);

//Route::resource('estacionamientos', 'App\Http\Controllers\EstacionamientoController');
Route::get('/reportes', function () {
    return view('reportes.reportes');
});

Route::get('/master', function () {
    return view('layouts.master');
});

