<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Competencia\ConcursanteController;
use Illuminate\Support\Facades\Route;

Route::prefix('competencias')->name('competencias.')->middleware('auth')->group(function () {

    // RUTAS DEL MODULO USUARIOS
    Route::controller(ConcursanteController::class)->group(function () {
        Route::get('/concursantes', 'index')->name('concursantes.index');
    });
});