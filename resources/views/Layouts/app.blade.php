<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final — Sistema</title>
    
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>

    <nav>
        <div class="nav-contenedor">
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('sobre-mi') }}">Sobre Mi</a>
            <a href="{{ route('materias') }}">Materias</a>
            <a href="{{ route('estudiantes.index') }}">Estudiantes</a>
            <a href="{{ route('contacto') }}">Contacto</a>
        </div>
    </nav>

    <div class="contenedor">
        @yield('content')
    </div>

</body>
</html>