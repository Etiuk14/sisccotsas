@extends('layouts.admin')

@section('content')
    <div class="profile-container">
        <h2 class="profile-title">Editar Perfil</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombres y Apellidos:</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="document_number">Número de Documento:</label>
                <input type="text" id="document_number" name="document_number" value="{{ Auth::user()->document_number }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Número de Celular:</label>
                <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="form-group">
                <label for="position">Cargo/Ocupación en la Empresa:</label>
                <input type="text" id="position" name="position" value="{{ Auth::user()->position }}">
            </div>
            <div class="form-group">
                <label for="role">Rol:</label>
                <input type="text" id="role" name="role" value="{{ Auth::user()->role }}">
            </div>
            <div class="form-group">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" id="password" name="password">
                <small>Si no va a cambiar la contraseña, deje este espacio en blanco.</small>
            </div>
            <div class="form-group">
                <button type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
@endsection

<style>
    .profile-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-title {
        background-color: #2c3e50;
        color: white;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 20px;
    }

    .alert {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group small {
        display: block;
        margin-top: 5px;
        color: #666;
    }

    .form-group button {
        background-color: #2c3e50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #34495e;
    }
</style>