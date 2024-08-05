<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\show_views;

use App\Http\Controllers\ServiciosController;

use App\Http\Controllers\PublicacionesController;

use App\Http\Controllers\ProductoController;

use App\Http\Controllers\CarritoController;

use App\Http\Controllers\NotificacionesController;

use App\Http\Controllers\SolicitudesController;

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


Route::get('/', [show_views::class, 'home'])->name('inicio');
/* Route::get('/tienda',[show_views::class,'productos'])->name('tienda'); */
// Route::get('/publicaciones',[show_views::class,'publicaciones'])->name('publicaciones');

Route::get('/publicaciones', [PublicacionesController::class, 'publicacionesIndex'])->name('publicaciones');




Route::get('/talleres', [PublicacionesController::class, 'talleresIndex'])->name('index');




//Rutas módulo servicios
Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios');

// Route::get('/mis_servicios', [ServiciosController::class, 'index'])->name('mis_servicios.index');
// Route::get('/servicios', [ServiciosController::class, 'create'])->name('servicios.create');
// Route::post('guardarForm/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
// Route::post('servicios/{id}/confirm', [ServiciosController::class, 'update'])->name('servicios.update');
// Route::get('/servicios/{id}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
// Route::get('/mis_servicios/search', [ServiciosController::class, 'search'])->name('servicios.search');
// Route::get('/servicios/{id}/eliminar', [ServiciosController::class, 'editForm'])->name('servicios.editForm'); //mostrar formulario para eliminar
// Route::post('/servicios/{id}/eliminar', [ServiciosController::class, 'softDelete'])->name('servicios.softDelete'); //eliminación lógica



//Fin rutas módulo servicios


Route::get('/maps', function () {
    return view('maps');
});



//RUTAS CON AUTENTICACIÓN DE MIDDLEWARE
//ESTE MIDDLEWARE SIRVE PARA ENCRIPTAR LAS SESIONES ACTIVAS, ASÍ COMO ENCRIPTAR LAS COOKIES
Route::group(['middleware' => 'auth'], function () {
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

    //Cambiar contraseña
    Route::post('/cambiar_contraseña', [LoginController::class, 'pchange']);


    //-----------------------------------------------------------------------------------//
    //TALLERES 
    //Autenticación en parte de regstro de taller por usuario autenticado
    Route::get('/mis_talleres', [PublicacionesController::class, 'misTalleresIndex'])->name('mis_talleres');

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
    Route::get('/mis_publicaciones', [PublicacionesController::class, 'misPublicacionesIndex'])->name('mis_publicaciones');

    Route::post('/registroPublicacion', [PublicacionesController::class, 'publicacionStore'])->name('publicacionStore');

    //-----------------------------------------------------------------------------------//
    //PRODUCTOS
    Route::get('/mis_productos', [ProductoController::class, 'misProductosIndex'])->name('mis_productos');

    Route::post('/registroProducto', [ProductoController::class, 'store'])->name('productoStore');

    Route::put('/actualizarProducto/{id}', [ProductoController::class, 'update'])->name('actualizarProducto');

    Route::put('/desactivarProducto/{id}', [ProductoController::class, 'offStatus'])->name('desactivarProducto');

    Route::put('/activarProducto/{id}', [ProductoController::class, 'onStatus'])->name('activarProducto');
    //----------------------------------------------------------------------------------//
    // Ruta para agregar un producto al carrito
    Route::post('/carrito/agregar/{id_producto}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
    // Ruta para eliminar un producto del carrito
    Route::delete('/carrito/eliminar/{id_producto}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');
    // Ruta para confirmar orde de compra
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarOrden'])->name('carrito.confirmar');
    // Ruta para agregar taller al carrito
    Route::post('/taller/{id_publicacion}', [CarritoController::class, 'registrarTaller'])->name('taller.registrar');
    // Ruta para eliminar taller del carrito
    Route::delete('/taller/{id_publicacion}', [CarritoController::class, 'eliminarTaller'])->name('taller.eliminar');

    // Ruta para ver notificaciones
    Route::get('/notificaciones', [NotificacionesController::class, 'index'])->name('notificaciones');
    Route::put('/concluir-orden/{id}/{id2}', [NotificacionesController::class, 'concluir_producto'])->name('concluirOrden');
    Route::put('/concluir-taller/{id}', [NotificacionesController::class, 'concluir_taller'])->name('concluirRelacion');
    Route::put('/concluir-solicitud/{id}', [NotificacionesController::class, 'concluir_servicio'])->name('concluirServicio');
    //-------------------------------------------------------------------------------------//
    //SERVICIOS

    Route::get('/mis_servicios', [ServiciosController::class, 'indexMisServicios'])->name('mis_servicios');

    Route::post('/registroServicio', [ServiciosController::class, 'store'])->name('registroServicios');

    Route::put('/actualizarServicio/{id}', [ServiciosController::class, 'update'])->name('actualizarServicio');

    Route::put('/desactivarServicio/{id}', [ServiciosController::class, 'offStatus'])->name('desactivarServicio');

    //-------------------------------------------------------------------------------------//
    //SOLICITUDES
    Route::get('/mis_solicitudes', [SolicitudesController::class, 'indexMisSolicitudes'])->name('mis_solicitudes');

    Route::post('/registrarSolicitud/{servicioId}/{proveedorId}', [SolicitudesController::class, 'store'])->name('registroSolicitud');
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
