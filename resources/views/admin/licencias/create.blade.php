@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear Nueva Licencia</h1>
    <form id="form-nueva-licencia" method="POST" action="{{ route('admin.licencias.store') }}">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Plan:</label>
            <input type="text" id="nombre" name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio del Plan:</label>
            <input type="number" id="precio" name="precio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="almacenamiento" class="block text-gray-700 text-sm font-bold mb-2">Espacio de Almacenamiento (GB):</label>
            <input type="number" id="almacenamiento" name="almacenamiento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción del Plan:</label>
            <textarea id="descripcion" name="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>
        <div class="mb-4">
            <label for="duracion" class="block text-gray-700 text-sm font-bold mb-2">Duración del Plan (meses):</label>
            <input type="number" id="duracion" name="duracion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="cantidad_usuarios" class="block text-gray-700 text-sm font-bold mb-2">Cantidad de Usuarios:</label>
            <input type="number" id="cantidad_usuarios" name="cantidad_usuarios" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="modulos" class="block text-gray-700 text-sm font-bold mb-2">Módulos Específicos:</label>
            <select id="modulos" name="modulos[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                <option value="modulo1">Módulo 1</option>
                <option value="modulo2">Módulo 2</option>
                <option value="modulo3">Módulo 3</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
        </div>
        <div class="mb-4">
            <label for="limite_usuarios_clientes" class="block text-gray-700 text-sm font-bold mb-2">Límite de Usuarios de Clientes:</label>
            <input type="number" id="limite_usuarios_clientes" name="limite_usuarios_clientes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="limite_clientes" class="block text-gray-700 text-sm font-bold mb-2">Límite de Clientes:</label>
            <input type="number" id="limite_clientes" name="limite_clientes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="limite_almacenamiento" class="block text-gray-700 text-sm font-bold mb-2">Límite de Almacenamiento (GB):</label>
            <input type="number" id="limite_almacenamiento" name="limite_almacenamiento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Crear Licencia
            </button>
        </div>
    </form>
</div>
@endsection