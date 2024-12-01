@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Configuración de Cliente</h1>
    <form action="{{ route('admin.client-settings.update', $setting) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="timezone" class="block text-sm font-medium text-gray-700">Zona Horaria</label>
            <input type="text" id="timezone" name="timezone" value="{{ $setting->timezone }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="language" class="block text-sm font-medium text-gray-700">Idioma</label>
            <input type="text" id="language" name="language" value="{{ $setting->language }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="currency_format" class="block text-sm font-medium text-gray-700">Formato de Moneda</label>
            <input type="text" id="currency_format" name="currency_format" value="{{ $setting->currency_format }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Actualizar</button>
    </form>
</div>
@endsection