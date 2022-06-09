<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/apiAllProductos', [App\Http\Controllers\API\ProductosController::class, 'apiAllProductos'])->name('apiAllProductos');

Route::get('/apiCategoriaProductos/{cat}', [App\Http\Controllers\API\ProductosController::class, 'apiCategoriaProductos'])->name('apiCategoriaProductos');

Route::get('/apiProducto/{pro}', [App\Http\Controllers\API\ProductosController::class, 'apiProducto'])->name('apiProducto');