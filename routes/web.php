<?php

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

Route::get('/', function () {
    return view('layout/inicio');
});


use App\Http\Controllers\PeliculaController;

Route::get('/contenido/{id}', [PeliculaController::class, 'show'])->name('contenido.show');
Route::post('/comentarios/{idpelicula}', [PeliculaController::class, 'storeComentario'])->name('comentarios.store');
Route::get('/buscar', [PeliculaController::class, 'search'])->name('contenido.search');
