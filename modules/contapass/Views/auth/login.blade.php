<!-- modules/contapass/Views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('contapass.login') }}">
        @csrf
        <div>
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Iniciar Sesión</button>
        </div>
    </form>
@endsection