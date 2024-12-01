@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Copia de Seguridad y Restauración</h1>
    <form action="{{ route('admin.backups.create') }}" method="POST">
        @csrf
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Crear Copia de Seguridad</button>
    </form>
    <form action="{{ route('admin.backups.restore') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Restaurar Copia de Seguridad</button>
    </form>
</div>
@endsection