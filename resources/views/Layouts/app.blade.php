<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final — Sistema</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.php') }}">
    <style>
        /* Estilos rápidos para que tu menú se vea ordenado */
        nav { background: #1a3c5e; padding: 15px; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-family: Arial, sans-serif; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .contenedor { max-width: 900px; margin: 40px auto; padding: 0 20px; font-family: Arial, sans-serif; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('sobre-mi') }}">Sobre Mí</a>
        <a href="{{ route('materias') }}">Materias</a>
        <a href="{{ route('estudiantes.index') }}">Estudiantes</a>
        <a href="{{ route('contacto') }}">Contacto</a>
    </nav>

    <div class="contenedor">
        @yield('content')
    </div>

</body>
</html>