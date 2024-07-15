<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\show_views;
use App\Http\Controllers\PublicacionController;

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
Route::get('/talleres',[show_views::class,'talleres'])->name('talleres');

Route::get('/registro', function () {
    return view('registro_usuario');
});

Route::get('/maps', function () {
    return view('maps');
});

// Rutas para publicaciones

// Route::get('/publicaciones/create',[PublicacionController::class,'create'])->name('publicaciones.create');
// Route::get('/publicaciones/index',[PublicacionController::class,'index'])->name('publicaciones.index');
// Route::get('/publicaciones',[PublicacionController::class,'store'])->name('publicacion.store');

Route::get('/publicaciones_acordion', [PublicacionController::class, 'acordion'])->name('publicaciones.acordion');
Route::resource('publicaciones', PublicacionController::class);
Route::post('publicaciones', [PublicacionController::class, 'store'])->name('publicaciones.store');



