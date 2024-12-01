@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Registro de Actividades</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Usuario</th>
                <th class="py-2">Acción</th>
                <th class="py-2">Descripción</th>
                <th class="py-2">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
            <tr>
                <td class="py-2">{{ $activity->user->name }}</td>
                <td class="py-2">{{ $activity->action }}</td>
                <td class="py-2">{{ $activity->description }}</td>
                <td class="py-2">{{ $activity->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $activities->links() }}
</div>
@endsection