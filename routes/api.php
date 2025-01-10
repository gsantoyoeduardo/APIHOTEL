<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DireccionController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\GlobalesController;
use App\Http\Controllers\CabeceraGlobalController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::post('/nuevouser', [UsuarioController::class, 'Crear']);

Route::get('/test', [UsuarioController::class, 'test']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//RUTAS PARA USUARIO
Route::prefix('/usuario')->group(function () {
    Route::get('/obtenerporid/{id}', [UsuarioController::class, 'ObtenerPorId']);
    Route::get('/obtenertodo', [UsuarioController::class, 'ObtenerTodos']);
    Route::post('/insertar', [UsuarioController::class, 'Crear']);
    Route::patch('/actualizar/{id}', [UsuarioController::class, 'Actualizar']);
    Route::delete('/eliminar/{id}', [UsuarioController::class, 'Eliminar']);
});
//RUTAS PARA CABECERA GLOBAL
Route::prefix('/cabeceraglobal')->group(function () {
    Route::get('/obtenerporid/{id}', [CabeceraGlobalController::class, 'ObtenerPorId']);
    Route::get('/obtenertodo', [CabeceraGlobalController::class, 'ObtenerTodos']);
    Route::post('/insertar', [CabeceraGlobalController::class, 'Crear']);
    Route::put('/actualizar/{id}', [CabeceraGlobalController::class, 'Actualizar']);
    Route::delete('/eliminar/{id}', [CabeceraGlobalController::class, 'Eliminar']);
});

// actualizar auth:api
// Rutas para Direccion
Route::prefix('/direccion')->group(function () {
    Route::get('/obtenerporid/{id}', [DireccionController::class, 'ObtenerPorId']);
    Route::get('/obtenertodo', [DireccionController::class, 'ObtenerTodos']);
    Route::post('/insertar', [DireccionController::class, 'Crear']);
    Route::put('/actualizar/{id}', [DireccionController::class, 'Actualizar']);
    Route::delete('/eliminar/{id}', [DireccionController::class, 'Eliminar']);
});

// Rutas para Lote
Route::prefix('/lote')->group(function () {
    Route::get('/obtenerporid/{id}', [LoteController::class, 'ObtenerPorId']);
    Route::get('/obtenertodo', [LoteController::class, 'ObtenerTodos']);
    Route::post('/insertar', [LoteController::class, 'Crear']);
    Route::put('/actualizar/{id}', [LoteController::class, 'Actualizar']);
    Route::delete('/eliminar/{id}', [LoteController::class, 'Eliminar']);
});

// Rutas para Almacen
Route::prefix('/almacen')->group(function () {
    Route::get('/obtenerporid/{id}', [AlmacenController::class, 'ObtenerPorId']);
    Route::get('/obtenertodo', [AlmacenController::class, 'ObtenerTodos']);
    Route::post('/insertar', [AlmacenController::class, 'Crear']);
    Route::put('/actualizar/{id}', [AlmacenController::class, 'Actualizar']);
    Route::delete('/eliminar/{id}', [AlmacenController::class, 'Eliminar']);
    Route::delete('/desactivar/{id}', [AlmacenController::class, 'Desactivar']);
});

// Rutas para Globales
Route::prefix('/globales')->group(function () {
    Route::get('/obtenerporid/{id}', [GlobalesController::class, 'ObtenerPorId']);
    Route::get('/obtenertodo', [GlobalesController::class, 'ObtenerTodos']);
    Route::post('/insertar', [GlobalesController::class, 'Crear']);
    Route::put('/actualizar/{id}', [GlobalesController::class, 'Actualizar']);
    Route::delete('/eliminar/{id}', [GlobalesController::class, 'Eliminar']);
});

// Rutas para Sucursal
Route::prefix('/sucursal')->group(function () {
    Route::get('/obtenerporid/{id}', [SucursalController::class, 'ObtenerPorId']);
    Route::get('/obtenertodo', [SucursalController::class, 'ObtenerTodos']);
    Route::post('/insertar', [SucursalController::class, 'Crear']);
    Route::put('/actualizar/{id}', [SucursalController::class, 'Actualizar']);
    Route::delete('/eliminar/{id}', [SucursalController::class, 'Eliminar']);
});

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});
