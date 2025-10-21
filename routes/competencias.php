<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Competencia\ConcursanteController;
use App\Http\Controllers\Competencia\ResultadoController;
use Illuminate\Support\Facades\Route;

Route::prefix('competencias')->name('competencias.')->middleware('auth')->group(function () {

    // RUTAS DEL MODULO CONCURSANTES
    Route::controller(ConcursanteController::class)->group(function () {
        Route::get('/concursantes', 'index')->name('concursantes.index');
    });

    // RUTAS DEL MODULO RESULTADOS
    Route::controller(ResultadoController::class)->group(function () {
        Route::get('/resultados', 'index')->name('resultados.index');
        Route::get('/resultados/create', 'create')->name('resultados.create');
        Route::get('/resultados/{competencia}', 'show')->name('resultados.show');
    });
});