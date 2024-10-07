<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout/inicio');
});

use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ReporteController;

Route::get('/reporte', [ReporteController::class, 'index']);

Route::post('/api/reportes', [ReporteController::class, 'store']);
Route::get('/contenido/{id}', [PeliculaController::class, 'show'])->name('contenido.show');
Route::post('/comentarios/{idpelicula}', [PeliculaController::class, 'storeComentario'])->name('comentarios.store');
Route::get('/buscar', [PeliculaController::class, 'search'])->name('contenido.search');
Route::get('/api/peliculas-relacionadas/{nombre}', [PeliculaController::class, 'relacionadas']);

// Nueva ruta para la vista quejas
Route::get('/quejas', function () {
    return view('layout/quejas');
})->name('quejas');
