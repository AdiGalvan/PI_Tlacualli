<?php

use App\Http\Controllers\LoginController;
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


Route::get('/maps', function () {
    return view('maps');
});


//Taller
//Creacion de taller
Route::post('/registroTaller', [PublicacionesController::class, 'store'])->name('tallerStore');

//Eliminación de publicaciones
Route::delete('/borrarTaller/{id}', [PublicacionesController::class, 'physicalDestroy'])->name('publicacionesDestroy');

//Desactivar taller
Route::put('/desactivarTaller/{id}', [PublicacionesController::class, 'offStatus'])->name('desactivarTaller');

//Activar taller
Route::put('/activarTaller/{id}', [PublicacionesController::class, 'onStatus'])->name('activarTaller');

//Actualizar informacion del taller
Route::put('/actualizarTaller/{id}', [PublicacionesController::class, 'update'])->name('actualizarTaller');

Route::get('/registrar', [LoginController::class, 'index']);
Route::post('/registrar', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/perfil', [LoginController::class, 'show']);
Route::get('/perfil/editar', [LoginController::class, 'edit']);
Route::post('/perfil/editar', [LoginController::class, 'update']);
Route::post('/cambiar_contraseña', [LoginController::class, 'pchange']);
Route::post('/perfil/eliminar', [LoginController::class, 'destroy']);

