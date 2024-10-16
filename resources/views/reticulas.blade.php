<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla con inicio de sesión</title>
    @vite(["resources/js/app.js"])

    <style>
        /* Estilos generales */
        body {
            background-color: #f8f9fa; /* Fondo claro */
            font-family: Arial, sans-serif; /* Fuente general */
            justify-content: center;
        }

        nav {
            margin-bottom: 20px; /* Espacio debajo de la barra de navegación */
        }

        .navbar-nav {
            padding-left: 0; /* Eliminar padding izquierdo */
        }

        /* Estilos de navegación */
        ul {
            list-style-type: none; /* Eliminar viñetas */
            padding: 0; /* Eliminar padding */
            margin: 0; /* Eliminar margen */
        }

        .nav-item {
            position: relative; /* Para posicionar los submenús */
        }

        .nav-link {
            display: block;
            padding: 10px 15px;
            color: #FFF;
            text-decoration: none;
            font-size: 15px;
            transition: background-color 0.3s; /* Transición suave al cambiar color */
        }

        /* Estilos para el menú desplegable */
        .dropdown {
            display: none; /* Ocultar por defecto */
            position: absolute; /* Posicionar el submenú */
            background: black;
            z-index: 999;
            min-width: 150px; /* Ancho mínimo para el submenú */
            border-radius: 4px; /* Bordes redondeados */
        }

        /* Mostrar submenú al pasar el ratón */
        ul li:hover .dropdown {
            display: block; /* Mostrar el submenú */
        }

        /* Estilo para los enlaces del submenú */
        .dropdown li a {
            padding: 10px 15px; /* Espaciado en el submenú */
            color: #FFF; /* Color blanco para los enlaces del submenú */
        }

        /* Efecto hover para los enlaces del submenú */
        .dropdown li a:hover {
            background: #112c66; /* Color de fondo al pasar el ratón */
        }

        /* Estilos para el botón de cerrar sesión */
        .btn {
            color: white;
            background-color: transparent;
            border: none;
            cursor: pointer; /* Cambiar cursor al pasar por encima */
        }

        /* Espaciado entre el botón y el resto de elementos */
        .btn-container {
            display: inline-block;
            margin-left: 10px;
        }

        /* Estilos para el botón de cerrar sesión al pasar el ratón */
        .btn:hover {
            text-decoration: underline; /* Subrayar al pasar el ratón */
        }

        /* Estilos para el select */
        .form-select {
            color: white;
            background-color: transparent;
            border: 1px solid white; /* Borde blanco */
            margin-left: 10px; /* Espaciado entre elementos */
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('plantillainicio') }}">Practica 2</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Catálogos</a>
                        <ul class="dropdown">
                            <li><a class="nav-link text-white" href="{{ route('periodos') }}">Periodos</a></li>
                            <li><a class="nav-link text-white" href="{{ route('plazas') }}">Plazas</a></li>
                            <li><a class="nav-link text-white" href="{{ route('puestos') }}">Puestos</a></li>
                            <li><a class="nav-link text-white" href="{{ route('personal') }}">Personal</a></li>
                            <li><a class="nav-link text-white" href="{{ route('deptos') }}">Deptos.</a></li>
                            <li><a class="nav-link text-white" href="{{ route('carreras') }}">Carreras</a></li>
                            <li><a class="nav-link text-white" href="{{ route('reticulas') }}">Retículas</a></li>
                            <li><a class="nav-link text-white" href="{{ route('materias') }}">Materias</a></li>
                            <li><a class="nav-link text-white" href="{{ route('alumnos') }}">Alumnos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Horarios</a>
                        <ul class="dropdown">
                            <li><a class="nav-link text-white" href="{{ route('docentes') }}">Docentes</a></li>
                            <li><a class="nav-link text-white" href="{{ route('alumnosh') }}">Alumnos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Proyectos Individuales</a>
                        <ul class="dropdown">
                            <li><a class="nav-link text-white" href="{{ route('capacitacion') }}">Capacitación</a></li>
                            <li><a class="nav-link text-white" href="{{ route('asesorias') }}">Asesorías Doc.</a></li>
                            <li><a class="nav-link text-white" href="{{ route('proyectos') }}">Proyectos</a></li>
                            <li><a class="nav-link text-white" href="{{ route('materiald') }}">Material Didáctico</a></li>
                            <li><a class="nav-link text-white" href="{{ route('docencia') }}">Docencia e Inv.</a></li>
                            <li><a class="nav-link text-white" href="{{ route('asesoriaext') }}">Asesoría Proyectos Ext.</a></li>
                            <li><a class="nav-link text-white" href="{{ route('asesoriass') }}">Asesoría a S.S.</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('instrumentacion') }}">Instrumentación</a>
                        <!-- Sin submenú -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('tutorias') }}">Tutorías</a>
                        <!-- Sin submenú -->
                    </li>
                    <li class="nav-item">
                        <select id="periodo" class="form-select" aria-label="Selecciona un periodo">
                            <option value="">Selecciona un periodo</option>
                            <option value="ene-jun-24">Ene-Jun 24</option>
                            <option value="ago-dic-24">Ago-Dic 24</option>
                            <option value="ene-jun-25">Ene-Jun 25</option>
                        </select>
                    </li>
                    <li class="nav-item btn-container">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn" style="color: white; background-color: transparent; border: none;">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        
    </nav>
    <!-- Contenedor centrado de bienvenida -->
    <div class="welcome-container">
        <h1>Bienvenido Reticulas</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada.</p>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <footer>
        @if (Auth::check())
            <p>Usuario: {{ Auth::user()->name }} | Correo: {{ Auth::user()->email }}</p>
        @else
            <p>No hay un usuario autenticado</p>
        @endif
    </footer>
</body>

</html>