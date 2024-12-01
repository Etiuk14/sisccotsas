@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Licencias</h1>
    <button id="nueva-licencia" class="bg-indigo-600 text-white py-3 px-6 rounded mb-4 inline-flex items-center">
        <span class="bg-white text-indigo-600 rounded-full w-6 h-6 flex items-center justify-center mr-2">+</span>
        Nueva Licencia
    </button>
    <button id="almacenamiento-adicional" class="bg-indigo-600 text-white py-3 px-6 rounded mb-4 inline-flex items-center">
        <span class="bg-white text-indigo-600 rounded-full w-6 h-6 flex items-center justify-center mr-2">+</span>
        Almacenamiento Adicional
    </button>
    <div id="contenido-licencias" class="bg-white p-4 rounded shadow">
        <!-- Aquí va el contenido de las licencias -->
        <table class="min-w-full bg-white border-collapse table-fixed">
            <thead>
                <tr>
                    <th class="border-b py-2 px-4 w-12">#</th>
                    <th class="border-b py-2 px-4 w-48">Nombre</th>
                    <th class="border-b py-2 px-4 w-48">Fecha de Expiración</th>
                    <th class="border-b py-2 px-4 w-48">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($licencias as $index => $licencia)
                <tr>
                    <td class="border-b py-2 px-4">{{ $index + 1 }}</td>
                    <td class="border-b py-2 px-4">{{ $licencia->nombre }}</td>
                    <td class="border-b py-2 px-4">{{ $licencia->fecha_expiracion->format('d/m/Y') }}</td>
                    <td class="border-b py-2 px-4">
                        <a href="{{ route('admin.licencias.edit', $licencia->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Editar</a>
                        <form action="{{ route('admin.licencias.destroy', $licencia->id) }}" method="POST" class="inline-block">
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
    document.getElementById('nueva-licencia').addEventListener('click', function() {
        fetch('{{ route('admin.licencias.create') }}')
            .then(response => response.text())
            .then(html => {
                document.getElementById('content').innerHTML = html;
            });
    });

    document.getElementById('almacenamiento-adicional').addEventListener('click', function() {
        // Lógica para abrir el formulario de almacenamiento adicional
    });
</script>
@endpush