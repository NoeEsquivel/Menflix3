<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Ruta que redirige a la página de login generada por Breeze
Route::get('/', function () {
    return view('auth.login');  // Vista de login generada por Breeze
});

// Rutas de autenticación generadas por Laravel Breeze
require __DIR__.'/auth.php';

// Ruta para el manejo del login
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');


// Ruta protegida para los usuarios autenticados
Route::middleware(['auth'])->group(function () {

    Route::get('/inicio', function () {
       return view('layout.inicio');  
    })->name('inicio');


    Route::get('/anime', [AnimeController::class, 'index'])->name('inicioa');
    Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('contenidoa.show');

    Route::get('/reporte', [ReporteController::class, 'index']);
    Route::post('/api/reportes', [ReporteController::class, 'store']);

    // Ruta que muestra el contenido de una película
    Route::get('/contenido/{id}', [PeliculaController::class, 'show'])->name('contenido.show');

    // Ruta que muestra el contenido de un anime
    //Route::get('/contenido2', [AnimeController::class, 'show'])->name('contenidoa.show');

    // Ruta para almacenar comentarios en una película
    Route::post('/comentarios/{idpelicula}', [PeliculaController::class, 'storeComentario'])->name('comentarios.store');

    // Ruta para almacenar comentarios en un anime
    Route::post('/comentariosa/{idanime}', [AnimeController::class, 'storeComentarioa'])->name('comentariosa.store');

    // Ruta para buscar películas
    Route::get('/buscar', [PeliculaController::class, 'search'])->name('contenido.search');

    // Ruta para buscar animes (opcional)
    Route::get('/buscar-anime', [AnimeController::class, 'search'])->name('contenidoa.search');

    // Ruta para mostrar películas relacionadas
    Route::get('/api/peliculas-relacionadas/{nombre}', [PeliculaController::class, 'relacionadas']);

    // Nueva ruta para la vista de quejas
    Route::get('/quejas', function () {
        return view('layout.quejas');
    })->name('quejas');
});