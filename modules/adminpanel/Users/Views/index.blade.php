<!-- modules/adminpanel/Users/Views/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Usuarios</h1>
    <a href="{{ route('adminpanel.users.create') }}">Crear Usuario</a>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @endforeach
    </ul>
@endsection