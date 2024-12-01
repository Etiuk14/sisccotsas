<?php
// modules/adminpanel/routes/web.php
use Illuminate\Support\Facades\Route;
use Modules\AdminPanel\Users\Http\Controllers\UserController;

Route::prefix('adminpanel')->group(function () {
    Route::resource('users', UserController::class);
    // Otras rutas de AdminPanel
});