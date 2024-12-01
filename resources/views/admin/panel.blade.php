@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4 mt-16">
    <h1 class="text-2xl font-bold mb-4">Bienvenido al Panel Administrativo</h1>
    <div class="grid grid-cols-3 gap-4">
        <!-- Aquí van las métricas -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold mb-2">Total de Usuarios</h2>
            <p class="text-3xl">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold mb-2">Total de Actividades</h2>
            <p class="text-3xl">{{ $totalActivities }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold mb-2">Actividades Recientes</h2>
            <ul>
                @foreach($recentActivities as $activity)
                <li>{{ $activity->user->name }}: {{ $activity->action }} ({{ $activity->created_at->format('d/m/Y H:i') }})</li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Aquí va el contenido existente del módulo de inicio -->
</div>
@endsection