<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\ClientSettingsController;
use App\Http\Controllers\StorageController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas para clientes
Route::get('/clientes', [ClientController::class, 'showLoginForm'])->name('client.login');
Route::post('/clientes/login', [ClientController::class, 'login'])->name('client.login.submit');
Route::get('/clientes/dashboard', [ClientController::class, 'dashboard'])->middleware('auth:client')->name('client.dashboard');

// Rutas para administradores
Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admin')->name('admin.dashboard');

// Rutas para el panel administrativo
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/panel', [AdminPanelController::class, 'index'])->name('admin.panel');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin.profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/some-action', [AdminPanelController::class, 'someAction'])->name('admin.someAction');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admin')->name('admin.dashboard');
});

// Rutas para los módulos
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/clientes', [AdminController::class, 'clientes'])->name('admin.clientes');
    Route::post('/admin/clientes/{id}/bloquear', [AdminController::class, 'bloquearCliente'])->name('admin.clientes.bloquear');
    Route::delete('/admin/clientes/{id}', [AdminController::class, 'destroy'])->name('admin.clientes.destroy');
    Route::get('/admin/licencias', [AdminController::class, 'licencias'])->name('admin.licencias');
    Route::get('/admin/licencias/create', [AdminController::class, 'createLicencia'])->name('admin.licencias.create');
    Route::post('/admin/licencias', [AdminController::class, 'storeLicencia'])->name('admin.licencias.store');
    Route::get('/admin/publicidad', [AdminController::class, 'publicidad'])->name('admin.publicidad');
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/admin/logErrores', [AdminController::class, 'logErrores'])->name('admin.logErrores');
    Route::get('/admin/seguimientoLicencias', [AdminController::class, 'seguimientoLicencias'])->name('admin.seguimientoLicencias');
    Route::get('/admin/auditorias', [AdminController::class, 'auditorias'])->name('admin.auditorias');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin.profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    
    // Agregar las rutas combinadas
    Route::get('/admin/activities', [ActivityController::class, 'index'])->name('admin.activities');
    Route::get('/admin/backups', [BackupController::class, 'index'])->name('admin.backups');
    Route::post('/admin/backups/create', [BackupController::class, 'createBackup'])->name('admin.backups.create');
    Route::post('/admin.backups/restore', [BackupController::class, 'restoreBackup'])->name('admin.backups.restore');
    Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications');
    Route::post('/admin/notifications/{notification}/markAsRead', [NotificationController::class, 'markAsRead'])->name('admin.notifications.markAsRead');
    Route::get('/admin/metrics', [MetricsController::class, 'index'])->name('admin.metrics');
    Route::resource('/admin/client-settings', ClientSettingsController::class)->names('admin.client-settings');
    Route::resource('/admin/storages', StorageController::class)->names('admin.storages');
});

// Definir la ruta dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rutas Modulos
require base_path('modules/contapass/routes/web.php');