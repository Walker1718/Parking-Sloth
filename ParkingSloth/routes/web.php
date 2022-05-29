<?php

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
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/test', function() {
    return view('test');
=======
Route::get('/admin', function () {
    return view('layouts.admin');
>>>>>>> 42b8e929de1ccae7521959b248ba4dcd4d18d9be
});
