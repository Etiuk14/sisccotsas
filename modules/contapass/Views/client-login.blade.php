@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Publicidad -->
    <div class="w-2/3 bg-white p-8">
        <h2 class="text-2xl font-bold mb-4">Publicidad</h2>
        <div id="publicidad">
            <!-- Aquí se cargará la publicidad desde el módulo de publicidad -->
            <!-- Ejemplo de contenido de publicidad -->
            <div class="mb-4">
                <img src="https://via.placeholder.com/600x400" alt="Publicidad 1" class="w-full h-auto">
                <p class="mt-2">Descripción de la publicidad 1.</p>
            </div>
            <div class="mb-4">
                <img src="https://via.placeholder.com/600x400" alt="Publicidad 2" class="w-full h-auto">
                <p class="mt-2">Descripción de la publicidad 2.</p>
            </div>
        </div>
    </div>

    <!-- Formulario de Inicio de Sesión -->
    <div class="w-1/3 bg-white p-8">
        <h2 class="text-2xl font-bold mb-4">Inicio de Sesión para Clientes</h2>
        <form method="POST" action="{{ route('client.login.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</div>
@endsection