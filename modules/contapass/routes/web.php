<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

// Rutas específicas del módulo Contapass
Route::prefix('contapass')->group(function () {
    Route::get('/clientes', [ClientController::class, 'showLoginForm'])->name('module.client.login');
});