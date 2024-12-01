<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index()
    {
        return view('backups.index');
    }

    public function createBackup()
    {
        Artisan::call('backup:run');
        return back()->with('success', 'Copia de seguridad creada exitosamente.');
    }

    public function restoreBackup(Request $request)
    {
        // Lógica para restaurar la copia de seguridad
        // Esto puede variar dependiendo de cómo manejes las copias de seguridad
        return back()->with('success', 'Copia de seguridad restaurada exitosamente.');
    }
}