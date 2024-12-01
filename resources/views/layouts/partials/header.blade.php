<div class="header">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    <div class="title">Panel de Control de Clientes</div>
    <div class="user-info">
        <div class="user-details">
            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>
        </div>
        <div class="dropdown-content">
            <a href="#" onclick="showProfileForm()">Perfil</a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
        </div>
    </div>
</div>