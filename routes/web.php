<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Articulos\ArticuloController;
use App\Http\Controllers\Autores\AutorController;
use App\Http\Controllers\Libros\LibroController;
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
    return view('layout');
})->name('home');

//Route::get('/',[ArticuloController::class,'index']);
Route::resource('/articulos',ArticuloController::class)->names('articulos');
Route::resource('/autores',AutorController::class)->names('autores');
Route::resource('/libros',LibroController::class)->names('libros');
