<?php

use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\PescadoController;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InicioSesionController;
use App\Http\Controllers\MariscoController;
use App\Http\Controllers\ProveedorController;

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaController;




use Illuminate\Support\Facades\Route;

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

// Inicio de Sesion
Route::get('/', [InicioSesionController::class, 'inicio'])->name('inicio');
Route::get('/registro', [InicioSesionController::class, 'registro'])->name('registro');
Route::post('/gestionRegistro', [InicioSesionController::class, 'gestionRegistro'])->name('gestionRegistro');
Route::post('/gestionInicioSesion', [InicioSesionController::class, 'gestionInicio'])->name('gestionInicioSesion');
Route::post('logout', [InicioSesionController::class, 'logout'])->name('logout');
Route::get('/updatePassword', [InicioSesionController::class, 'updatePassword'])->name('update.password');
Route::post('/verificarDatos', [InicioSesionController::class, 'verificarDatos'])->name('verificar.datos');
Route::post('/actualizarPassword', [InicioSesionController::class, 'actualizarPassword'])->name('actualizar.password');

// Clientes
Route::view('/inicio', 'Clientes.inicio')->name('clientes.inicio');
Route::get('/inicio/pescado', [PescadoController::class, 'showPescados'])->name('clientes.pescado');
Route::get('/inicio/pescado/show/{pescado}', [PescadoController::class, 'showPescadoDetails'])->name('clientes.pescadoDetails');
Route::get('/inicio/marisco/show/{marisco}', [MariscoController::class, 'showMariscoDetails'])->name('clientes.mariscoDetails');
Route::get('/inicio/Marisco', [MariscoController::class, 'showMariscos'])->name('clientes.marisco');


// Carrito
Route::post('/carrito', [CarritoController::class, 'gestionCarrito'])->name('gestionCarrito');
Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito.mostrar');
Route::get('/confirmacion/{factura}', [CarritoController::class, 'mostrarConfirmacion'])->name('confirmacion');
Route::post('/finalizarCompra', [CarritoController::class, 'finalizarCompra'])->name('finalizarCompra');
Route::post('/eliminar-producto', [CarritoController::class, 'eliminarProductoCarrito'])->name('carrito.rmProducto');




// Perfiles
Route::get('/perfil', [InicioSesionController::class, 'perfil'])->name('perfil');
Route::get('/perfil', [InicioSesionController::class, 'perfil'])->name('perfil');
Route::put('/perfil', [InicioSesionController::class, 'updatePerfil'])->name('updatePerfil');

// Buscador
Route::post('/buscador', [BuscadorController::class, 'buscar'])->name('buscador');


Route::view('/inicioAdmin', 'index')->name('inicioAdmin');

Route::view('/usuarios', 'Usuarios.usuarios')->name('usuarios');

// Facturas Clientes
Route::get('/facturas', [CarritoController::class, 'mostrarFacturas'])->name('facturas');
Route::get('/facturas/{factura}', [CarritoController::class, 'detalleFactura'])->name('factura.detalle');

// Facturas Administrador
Route::get('/facturasAdministrador', [FacturaController::class, 'mostrarFacturas'])->name('facturas.admin');
Route::post('/eliminarFactura/{factura}', [FacturaController::class, 'rmFactura'])->name('factura.rm');

// Pescado
Route::view('/pescado', 'Pescado.pescado')->name('pescado');
Route::get('/pescado/add', [PescadoController::class, 'add'])->name('addPescado');
Route::post('/pescado/add', [PescadoController::class, 'gestionAdd'])->name('gestionAddPescado');
Route::get('/pescado/show', [PescadoController::class, 'show'])->name('showPescado');
Route::get('/pescado/edit', [PescadoController::class, 'edit'])->name('editPescado');
Route::put('/pescado/update', [PescadoController::class, 'update'])->name('updatePescado');
Route::get('/pescado/rm', [PescadoController::class, 'rm'])->name('rmPescado');
Route::delete('/pescado/delete', [PescadoController::class, 'delete'])->name('deletePescado');

// Marisco
Route::view('/marisco', 'Marisco.marisco')->name('marisco');
Route::get('/marisco/add', [MariscoController::class, 'add'])->name('addMarisco');
Route::post('/marisco/add', [MariscoController::class, 'gestionAdd'])->name('gestionAddMarisco');
Route::get('/marisco/show', [MariscoController::class, 'show'])->name('showMarisco');
Route::get('/marisco/rm', [MariscoController::class, 'rm'])->name('rmMarisco');
Route::delete('/marisco/delete', [MariscoController::class, 'delete'])->name('deleteMarisco');
Route::get('/marisco/edit', [MariscoController::class, 'edit'])->name('editMarisco');
Route::put('/marisco/update', [MariscoController::class, 'update'])->name('updateMarisco');

// Proveedores
Route::view('/proveedores', 'Proveedor.proveedor')->name('proveedor');
Route::get('/proveedor/add', [ProveedorController::class, 'add'])->name('addProveedor');
Route::post('/proveedor/add', [ProveedorController::class, 'gestionAdd'])->name('gestionAddProveedor');
Route::get('/proveedor/show', [ProveedorController::class, 'show'])->name('showProveedor');
Route::get('/proveedor/rm', [ProveedorController::class, 'rm'])->name('rmProveedor');
Route::put('/proveedor/delete', [ProveedorController::class, 'delete'])->name('deleteProveedor');
Route::get('/proveedor/edit', [ProveedorController::class, 'edit'])->name('editProveedor');
Route::put('/proveedor/update', [ProveedorController::class, 'update'])->name('updateProveedor');


// Buscador
// Route::get('/buscar', [BuscadorController::class, 'buscar'])->name('buscar');






// Productos
Route::get('/productos', [ProductoController::class, 'show'])->name('productos');



