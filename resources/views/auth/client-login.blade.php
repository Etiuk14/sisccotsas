@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Publicidad -->
    <div class="w-2/3 bg-white p-8 flex items-center justify-center">
        <div id="publicidad">
            <!-- Aquí se cargará la publicidad desde el módulo de publicidad -->
            <!-- Ejemplo de contenido de publicidad -->
            <img src="https://via.placeholder.com/800x600" alt="Publicidad" class="w-full h-auto">
        </div>
    </div>

    <!-- Formulario de Inicio de Sesión -->
    <div class="w-1/3 bg-white p-8 flex items-center justify-center">
        <div class="w-full h-full flex flex-col justify-center items-center">
            <div class="w-full max-w-md mx-auto">
                <h1 class="text-4xl font-bold mb-4 text-center">Bienvenido a Contapass</h1>
                <h2 class="text-2xl font-bold mb-4 text-center">Inicio de Sesión</h2>
                <form method="POST" action="{{ route('client.login.submit') }}" class="w-full">
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
                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="text-sm text-blue-500 hover:underline">¿No te has registrado? Crear usuario gratis</a>
                </div>
                <div class="text-center mt-2">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">¿Has olvidado tu contraseña? Cambiar contraseña</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection