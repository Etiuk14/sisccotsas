@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Licencia</h1>
    <form action="{{ route('admin.licenses.update', $license) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" name="name" value="{{ $license->name }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="expiration_date" class="block text-sm font-medium text-gray-700">Fecha de Vencimiento</label>
            <input type="date" id="expiration_date" name="expiration_date" value="{{ $license->expiration_date->format('Y-m-d') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Actualizar</button>
    </form>
</div>
@endsection