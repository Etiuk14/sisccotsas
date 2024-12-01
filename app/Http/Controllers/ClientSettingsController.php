<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientSetting;

class ClientSettingsController extends Controller
{
    public function index()
    {
        $settings = ClientSetting::with('client')->get();
        return view('admin.client-settings.index', compact('settings'));
    }

    public function edit(ClientSetting $setting)
    {
        return view('client-settings.edit', compact('setting'));
    }

    public function update(Request $request, ClientSetting $setting)
    {
        $request->validate([
            'timezone' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'currency_format' => 'required|string|max:255',
        ]);

        $setting->update($request->all());

        return redirect()->route('admin.client-settings.index')->with('success', 'Configuración actualizada exitosamente.');
    }
}