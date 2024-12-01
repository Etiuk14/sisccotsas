@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Auditorías</h1>
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
            @foreach($audits as $audit)
            <tr>
                <td class="py-2">{{ $audit->user->name }}</td>
                <td class="py-2">{{ $audit->action }}</td>
                <td class="py-2">{{ $audit->description }}</td>
                <td class="py-2">{{ $audit->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $audits->links() }}
</div>
@endsection