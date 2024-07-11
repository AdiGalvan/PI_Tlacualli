<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\show_views;
use App\Http\Controllers\ServiciosController;

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

//Rutas módulo servicios
Route::get('/mis_servicios', [ServiciosController::class, 'index'])->name('mis_servicios.index');
Route::get('/servicios',[ServiciosController::class,'create'])->name('servicios.create');
Route::post('guardarForm/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
Route::post('servicios/{id}/confirm', [ServiciosController::class,'update'])->name('servicios.update');
Route::get('/servicios/{id}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::get('/mis_servicios/search', [ServiciosController::class, 'search'])->name('servicios.search');
Route::get('/servicios/{id}/eliminar', [ServiciosController::class, 'editForm'])->name('servicios.editForm'); //mostrar formulario para eliminar
Route::post('/servicios/{id}/eliminar', [ServiciosController::class, 'softDelete'])->name('servicios.softDelete'); //eliminación lógica



//Fin rutas módulo servicios


Route::get('/registro', function () {
    return view('registro_usuario');
});

Route::get('/maps', function () {
    return view('maps');
});

