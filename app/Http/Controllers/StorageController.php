<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;

class StorageController extends Controller
{
    public function index()
    {
        $storages = Storage::latest()->paginate(10);
        return view('storages.index', compact('storages'));
    }

    public function create()
    {
        return view('storages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'storage_limit' => 'required|integer',
        ]);

        Storage::create($request->all());

        return redirect()->route('admin.storages.index')->with('success', 'Almacenamiento adicional creado exitosamente.');
    }

    public function edit(Storage $storage)
    {
        return view('storages.edit', compact('storage'));
    }

    public function update(Request $request, Storage $storage)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'storage_limit' => 'required|integer',
        ]);

        $storage->update($request->all());

        return redirect()->route('admin.storages.index')->with('success', 'Almacenamiento adicional actualizado exitosamente.');
    }

    public function destroy(Storage $storage)
    {
        $storage->delete();

        return redirect()->route('admin.storages.index')->with('success', 'Almacenamiento adicional eliminado exitosamente.');
    }
}