@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Listado de Clientes</h1>
    <button id="nuevo-cliente" class="bg-indigo-600 text-white py-3 px-6 rounded mb-4 inline-flex items-center">
        <span class="bg-white text-indigo-600 rounded-full w-6 h-6 flex items-center justify-center mr-2">+</span>
        Nuevo Cliente
    </button>
    <div id="contenido-clientes" class="bg-white p-4 rounded shadow">
        <table class="min-w-full bg-white border-collapse table-fixed">
            <thead>
                <tr>
                    <th class="border-b py-2 px-4 w-12">#</th>
                    <th class="border-b py-2 px-4 w-32">N° Identificación</th>
                    <th class="border-b py-2 px-4 w-48">Nombre</th>
                    <th class="border-b py-2 px-4 w-64">Correo</th>
                    <th class="border-b py-2 px-4 w-48">Cantidad Almacenamiento</th>
                    <th class="border-b py-2 px-4 w-32">Bloquear Cuenta</th>
                    <th class="border-b py-2 px-4 w-32">Ciclo de Inicio</th>
                    <th class="border-b py-2 px-4 w-32">Ciclo de Renovación</th>
                    <th class="border-b py-2 px-4 w-48">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $index => $cliente)
                <tr>
                    <td class="border-b py-2 px-4">{{ $index + 1 }}</td>
                    <td class="border-b py-2 px-4">{{ $cliente->identificacion }}</td>
                    <td class="border-b py-2 px-4">{{ $cliente->name }}</td>
                    <td class="border-b py-2 px-4">{{ $cliente->email }}</td>
                    <td class="border-b py-2 px-4">{{ $cliente->almacenamiento }} GB</td>
                    <td class="border-b py-2 px-4">
                        <input type="checkbox" class="toggle-switch" data-id="{{ $cliente->id }}" {{ $cliente->bloqueado ? 'checked' : '' }}>
                    </td>
                    <td class="border-b py-2 px-4">{{ $cliente->created_at->format('d/m/Y') }}</td>
                    <td class="border-b py-2 px-4">{{ $cliente->ciclo_renovacion->format('d/m/Y') }}</td>
                    <td class="border-b py-2 px-4">
                        <a href="{{ route('admin.client-settings.edit', $cliente->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Editar</a>
                        <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('nuevo-cliente').addEventListener('click', function() {
        // Lógica para abrir el formulario de nuevo cliente
    });

    document.querySelectorAll('.toggle-switch').forEach(function(toggle) {
        toggle.addEventListener('change', function() {
            const clientId = this.dataset.id;
            const bloqueado = this.checked;

            fetch(`/admin/clientes/${clientId}/bloquear`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ bloqueado })
            });
        });
    });
</script>
@endpush