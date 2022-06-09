<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();
/* productos */
Route::get('/editarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'editarProducto'])->name('editarProducto');
Route::put('/updateProducto/{id}', [App\Http\Controllers\ProductosController::class, 'updateProducto'])->name('updateProducto');
Route::delete('/deleteProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('deleteProducto');

Route::get('/nuevoProducto', [App\Http\Controllers\ProductosController::class, 'nuevoProducto'])->name('nuevoProducto');
Route::post('/insertProducto', [App\Http\Controllers\ProductosController::class, 'insertProducto'])->name('insertProducto');

/* categorias */
Route::get('/categorias', [App\Http\Controllers\CategoriasController::class, 'categoriasAll'])->name('categorias');
Route::get('/editarCategorias/{id}', [App\Http\Controllers\CategoriasController::class, 'editarCategorias'])->name('editarCategorias');
Route::put('/updateCategoria/{id}', [App\Http\Controllers\CategoriasController::class, 'updateCategoria'])->name('updateCategoria');
Route::delete('/deleteCategoria/{id}', [App\Http\Controllers\CategoriasController::class, 'deleteCategoria'])->name('deleteCategoria');

Route::post('/filtro', [App\Http\Controllers\ProCatController::class, 'filtroCategoria'])->name('filtro');

/* productosCategorias */
Route::post('/productoCategoria/{id}', [App\Http\Controllers\ProCatController::class, 'productoCategoria'])->name('productoCategoria');
Route::post('insertProductoCategoria/{pro}/{cat}', [App\Http\Controllers\ProCatController::class, 'insertProductoCategoria']);
/* Route::post('/insertProductoCategoria/{pro}/{cat}', [App\Http\Controllers\ProCatController::class, 'insertProductoCategoria'])->name('insertProductoCategoria'); */

Route::get('/nuevaCategoria', [App\Http\Controllers\CategoriasController::class, 'nuevaCategoria'])->name('nuevaCategoria');
Route::post('/insertCategoria', [App\Http\Controllers\CategoriasController::class, 'insertCategoria'])->name('insertCategoria');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
