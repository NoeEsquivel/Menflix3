<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/reportes', [ReporteController::class, 'store']);
Route::get('/reportes/{idpelicula}', [ReporteController::class, 'show']);
Route::delete('/reportes/{id}', [ReporteController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
