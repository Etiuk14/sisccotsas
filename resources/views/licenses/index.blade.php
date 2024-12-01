@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Seguimiento de Licencias</h1>
    <a href="{{ route('admin.licenses.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Crear Licencia</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Nombre</th>
                <th class="py-2">Fecha de Vencimiento</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($licenses as $license)
            <tr>
                <td class="py-2">{{ $license->name }}</td>
                <td class="py-2">{{ $license->expiration_date->format('d/m/Y') }}</td>
                <td class="py-2">
                    <a href="{{ route('admin.licenses.edit', $license) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Editar</a>
                    <form action="{{ route('admin.licenses.destroy', $license) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $licenses->links() }}
</div>
@endsection