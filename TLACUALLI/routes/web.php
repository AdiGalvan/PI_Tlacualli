<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\show_views;

use App\Http\Controllers\PublicacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[show_views::class,'home'])->name('inicio');
Route::get('/tienda',[show_views::class,'productos'])->name('tienda');
Route::get('/publicaciones',[show_views::class,'publicaciones'])->name('publicaciones');
Route::get('/talleres',[PublicacionesController::class,'index'])->name('index');

Route::get('/mis_talleres',[PublicacionesController::class,'index_mis_talleres'])->name('mis_talleres');

Route::get('/registro', function () {
    return view('registro_usuario');
});

Route::get('/maps', function () {
    return view('maps');
});


//Publicaciones
//Creacion de taller
Route::post('/registroTaller', [PublicacionesController::class, 'store'])->name('tallerStore');