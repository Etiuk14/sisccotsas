@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Almacenamiento Adicional</h1>
    <a href="{{ route('admin.storages.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Crear Almacenamiento</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Cliente</th>
                <th class="py-2">Límite de Almacenamiento</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($storages as $storage)
            <tr>
                <td class="py-2">{{ $storage->client->name }}</td>
                <td class="py-2">{{ $storage->storage_limit }} GB</td>
                <td class="py-2">
                    <a href="{{ route('admin.storages.edit', $storage) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Editar</a>
                    <form action="{{ route('admin.storages.destroy', $storage) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $storages->links() }}
</div>
@endsection