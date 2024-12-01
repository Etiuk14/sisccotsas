@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Notificaciones</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Tipo</th>
                <th class="py-2">Datos</th>
                <th class="py-2">Fecha</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
            <tr>
                <td class="py-2">{{ $notification->type }}</td>
                <td class="py-2">{{ json_encode($notification->data) }}</td>
                <td class="py-2">{{ $notification->created_at->format('d/m/Y H:i') }}</td>
                <td class="py-2">
                    @if(is_null($notification->read_at))
                    <form action="{{ route('admin.notifications.markAsRead', $notification) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white py-1 px-2 rounded">Marcar como Leída</button>
                    </form>
                    @else
                    <span class="text-gray-500">Leída</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $notifications->links() }}
</div>
@endsection