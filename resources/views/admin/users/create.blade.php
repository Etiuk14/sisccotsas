@extends('layouts.admin')

@section('content')
    <div class="user-container">
        <h2 class="user-title">Crear Usuario Administrador</h2>
        <form id="create-user-form" action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombres y Apellidos:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="document_number">Número de Documento:</label>
                <input type="text" id="document_number" name="document_number" required>
            </div>
            <div class="form-group">
                <label for="phone">Número de Celular:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="position">Cargo/Ocupación en la Empresa:</label>
                <input type="text" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="roles">Roles:</label>
                @foreach($roles as $role)
                    <div class="role">
                        <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
                        <label for="role_{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="modules">Módulos y Permisos:</label>
                @foreach($modules as $module)
                    <div class="module">
                        <h4>{{ $module->name }}</h4>
                        @foreach($module->permissions as $permission)
                            <div class="permission">
                                <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}">
                                <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <button type="submit">Crear Usuario</button>
            </div>
        </form>
    </div>
@endsection

<style>
    .user-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .user-title {
        background-color: #2c3e50;
        color: white;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select {
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

    .module {
        margin-bottom: 15px;
    }

    .module h4 {
        margin-bottom: 10px;
    }

    .permission {
        margin-bottom: 5px;
    }
</style>