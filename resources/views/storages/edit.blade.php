@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Almacenamiento Adicional</h1>
    <form action="{{ route('admin.storages.update', $storage) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="client_id" class="block text-sm font-medium text-gray-700">Cliente</label>
            <select id="client_id" name="client_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($clients as $client)
                <option value="{{ $client->id }}" @if($client->id == $storage->client_id) selected @endif>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="storage_limit" class="block text-sm font-medium text-gray-700">Límite de Almacenamiento (GB)</label>
            <input type="number" id="storage_limit" name="storage_limit" value="{{ $storage->storage_limit }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Actualizar</button>
    </form>
</div>
@endsection