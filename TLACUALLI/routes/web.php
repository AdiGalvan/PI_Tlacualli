<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\show_views;
use App\Http\Controllers\ControllerProductos;

use App\Http\Controllers\ServiciosController;

use App\Http\Controllers\PublicacionesController;

use App\Http\Controllers\ProductoController;

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
/* Route::get('/tienda',[show_views::class,'productos'])->name('tienda'); */
Route::get('/publicaciones',[show_views::class,'publicaciones'])->name('publicaciones');
Route::get('/talleres',[PublicacionesController::class,'index'])->name('index');

Route::get('/mis_talleres',[PublicacionesController::class,'index_mis_talleres'])->name('mis_talleres');


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


Route::get('/maps', function () {
    return view('maps');
});

<<<<<<< Updated upstream


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


Route::get('/productosCards', [ProductoController::class, 'Cards'])->name('productos.cards');
/* Route::get('/productosCards', [ProductoController::class, 'Cards']); */

Route::resource('productos', ProductoController::class);

/* Route::get('/productos/show', [ProductoController::class, 'show']); */

=======
/* YO PUSE */
// Rutas para el CRUD de productos
Route::resource('productos', ControllerProductos::class);



Route::get('/carrito-compras', function () {
    return view('carrito_compras');
})->name('carrito_compras');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
>>>>>>> Stashed changes
