<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Sistema Academico')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f5f5f5; color: #333; }
        header { background: #1a3c5e; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        header h1 { font-size: 1.1rem; font-weight: 600; }
        nav a { color: white; text-decoration: none; margin-left: 20px; font-size: 0.9rem; opacity: 0.85; }
        nav a:hover { opacity: 1; text-decoration: underline; }
        main { max-width: 960px; margin: 30px auto; padding: 0 20px; }
        h1, h2 { color: #1a3c5e; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
        th { background: #1a3c5e; color: white; padding: 11px 14px; text-align: left; }
        td { padding: 10px 14px; border-bottom: 1px solid #eee; }
        tbody tr:hover { filter: brightness(0.97); }
        .card { background: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); max-width: 600px; }
        .card dl { display: grid; grid-template-columns: 150px 1fr; gap: 10px 20px; margin-top: 15px; }
        .card dt { font-weight: bold; color: #555; }
        .card dd { margin: 0; }
        .btn { display: inline-block; background: #1a3c5e; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; font-size: 0.85rem; border: none; cursor: pointer; }
        .btn:hover { background: #132d46; }
        form p { margin-bottom: 15px; }
        form label { font-weight: bold; display: inline-block; margin-bottom: 5px; }
        form input[type="text"], form input[type="email"], form textarea { width: 100%; max-width: 400px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-family: sans-serif; }
    </style>
</head>
<body>

    <header>
        <h1>{{ $nombre ?? 'Kevin Brayan Colque Chuquimia' }}</h1>
        <nav>
            <a href="{{ route('inicio') }}">Inicio</a>
            <a href="{{ route('sobre-mi') }}">Sobre mi</a>
            <a href="{{ route('materias') }}">Materias</a>
            <a href="{{ route('contacto') }}">Contacto</a>
            <a href="{{ route('productos') }}">Productos</a>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer style="background: #1a3c5e; color: rgba(255,255,255,0.7); text-align: center; padding: 15px; margin-top: 40px; font-size: 0.82rem;">
        <p>&copy; {{ $ano ?? date('Y') }} - Algo pondre aqui</p>
    </footer>

</body>
</html>