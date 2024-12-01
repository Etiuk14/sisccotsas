<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::latest()->paginate(10);
        return view('licenses.index', compact('licenses'));
    }

    public function create()
    {
        return view('licenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expiration_date' => 'required|date',
        ]);

        License::create($request->all());

        return redirect()->route('admin.licenses.index')->with('success', 'Licencia creada exitosamente.');
    }

    public function edit(License $license)
    {
        return view('licenses.edit', compact('license'));
    }

    public function update(Request $request, License $license)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expiration_date' => 'required|date',
        ]);

        $license->update($request->all());

        return redirect()->route('admin.licenses.index')->with('success', 'Licencia actualizada exitosamente.');
    }

    public function destroy(License $license)
    {
        $license->delete();

        return redirect()->route('admin.licenses.index')->with('success', 'Licencia eliminada exitosamente.');
    }
}