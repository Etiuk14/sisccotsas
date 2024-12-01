@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Usuarios Administradores</h1>
    <a href="{{ route('admin.activities') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Ver Registro de Actividades</a>
    <!-- Aquí va el contenido existente del módulo de usuarios administradores -->
</div>
@endsection