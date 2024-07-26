<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\show_views;

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
// Route::get('/publicaciones',[show_views::class,'publicaciones'])->name('publicaciones');

Route::get('/publicaciones',[PublicacionesController::class,'publicacionesIndex'])->name('publicaciones');




Route::get('/talleres',[PublicacionesController::class,'talleresIndex'])->name('index');




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



//RUTAS CON AUTENTICACIÓN DE MIDDLEWARE
//ESTE MIDDLEWARE SIRVE PARA ENCRIPTAR LAS SESIONES ACTIVAS, ASÍ COMO ENCRIPTAR LAS COOKIES
Route::group(['middleware'=>'auth'], function(){
    //PERFIL PERSONAL
    //Muestra la información del perfil en sesion
    Route::get('/perfil', [LoginController::class, 'show']);

    //Muestra informacion del perfil en sesion
    Route::get('/perfil/editar', [LoginController::class, 'edit']);
    
    //Genera el update de la informacion del perfil
    Route::post('/perfil/editar', [LoginController::class, 'update']);

    //Genera la eliminacion logica del perfil
    Route::post('/perfil/eliminar', [LoginController::class, 'destroy']);
    
    //Cierra la sesion, invalida y renueva token 
    Route::post('/logout', [LoginController::class, 'logout']);


    //-----------------------------------------------------------------------------------//
    //TALLERES 
    //Autenticación en parte de regstro de taller por usuario autenticado
    Route::get('/mis_talleres',[PublicacionesController::class,'misTalleresIndex'])->name('mis_talleres');

    //Creacion de taller
    Route::post('/registroTaller', [PublicacionesController::class, 'tallerStore'])->name('tallerStore');

    //Eliminación de publicaciones
    Route::delete('/borrarTaller/{id}', [PublicacionesController::class, 'physicalDestroy'])->name('publicacionesDestroy');

    //Desactivar taller
    Route::put('/desactivarTaller/{id}', [PublicacionesController::class, 'offStatus'])->name('desactivarTaller');

    //Activar taller
    Route::put('/activarTaller/{id}', [PublicacionesController::class, 'onStatus'])->name('activarTaller');

    //Actualizar informacion del taller
    Route::put('/actualizarTaller/{id}', [PublicacionesController::class, 'update'])->name('actualizarTaller');

    //-----------------------------------------------------------------------------------//
    //PUBLICACIONES
    Route::get('/mis_publicaciones',[PublicacionesController::class,'misPublicacionesIndex'])->name('mis_publicaciones');

    Route::post('/registroPublicacion', [PublicacionesController::class, 'publicacionStore'])->name('publicacionStore');

    //-----------------------------------------------------------------------------------//
    //PRODUCTOS
    Route::get('/mis_productos', [ProductoController::class, 'misProductosIndex'])->name('mis_productos');



});

//RUTAS QUE NO NECESITAN AUTENTICACIÓN
Route::post('/login', [LoginController::class, 'login']);

Route::post('/cambiar_contraseña', [LoginController::class, 'pchange']);


Route::get('/registrar', [LoginController::class, 'index']);
Route::post('/registrar', [LoginController::class, 'create']);


Route::get('/productos', [ProductoController::class, 'index'])->name('productos');

/* Route::get('/productosCards', [ProductoController::class, 'Cards']); */

// Route::resource('productos', ProductoController::class);

/* Route::get('/productos/show', [ProductoController::class, 'show']); */

