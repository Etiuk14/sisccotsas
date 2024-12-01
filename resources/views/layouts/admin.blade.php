<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <!-- Enlace a la biblioteca gratuita de Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ecf0f1;
            padding: 10px 20px;
            height: 60px;
            box-sizing: border-box;
            border-bottom: 1px solid #bdc3c7;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 12%; /* Ajustar el ancho para que coincida con la barra de módulos */
        }

        .logo img {
            height: 55px;
        }

        .title {
            font-size: 24px; /* Aumentar el tamaño del texto */
            font-weight: bold;
            text-align: center;
            flex-grow: 1;
        }

        .user-info {
            position: relative;
            cursor: pointer;
        }

        .user-details {
            text-align: right;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        .dropdown-content a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: black;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .user-info:hover .dropdown-content {
            display: block;
        }

        .main {
            display: flex;
            height: calc(100% - 60px); /* Ajustar para que el contenido no se superponga con la barra superior */
            margin-top: 60px; /* Altura de la barra superior */
        }

        .sidebar {
            width: 15%; /* Ajustar el ancho de la barra de módulos */
            background-color: #2c3e50;
            color: white;
            padding: 0; /* Reducir el padding para subir un poco la barra de iconos */
            height: calc(100% - 60px); /* Ajustar la altura para que comience después de la barra superior */
            position: fixed;
            top: 60px; /* Altura de la barra superior */
            left: 0;
            overflow-y: auto;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            height: 80px; /* Aumentar más la altura de cada elemento */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center; /* Centrar el texto y los iconos */
            font-size: 18px; /* Aumentar el tamaño de texto */
            margin-bottom: 5px; /* Añadir una separación pequeña entre los módulos */
        }

        .sidebar ul li:last-child {
            margin-bottom: 0; /* Eliminar la separación del último módulo */
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%; /* Asegurar que el enlace ocupe todo el ancho del contenedor */
            height: 100%; /* Asegurar que el enlace ocupe toda la altura del contenedor */
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
        }

        .sidebar ul li a i {
            font-size: 24px; /* Aumentar el tamaño de los iconos */
            margin-bottom: 5px; /* Añadir un margen inferior para separar el icono del texto */
        }

        .content {
            margin-left: 15%; /* Ajustar el margen izquierdo para que coincida con el ancho de la barra de módulos */
            padding: 20px;
            background-color: #ecf0f1;
            height: calc(100% - 60px); /* Para evitar superposición con la barra superior */
            overflow-y: auto;
            transition: margin-left 0.3s ease; /* Transición suave para el margen */
            width: calc(100% - 15%); /* Asegurarse de que el área de contenido ocupe el resto del espacio */
        }
    </style>
</head>
<body>
    @include('layouts.partials.header')
    <div class="main">
        @include('layouts.partials.sidebar')
        <div class="content" id="content">
            @yield('content')
        </div>
    </div>

    <script>
        document.querySelectorAll('.load-content').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.dataset.url;

                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('content').innerHTML = html;
                    });
            });
        });

        function showProfileForm() {
            fetch('{{ route('admin.profile') }}')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                });
        }
    </script>
    @yield('scripts')
</body>
</html>