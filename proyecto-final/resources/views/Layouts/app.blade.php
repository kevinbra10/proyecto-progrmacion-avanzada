<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final - Sistema</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-gray-100 font-sans min-h-screen flex flex-col">

    <nav class="bg-gray-800 text-white p-4 shadow-lg sticky top-0 z-50 border-b border-gray-700">
        <div class="container mx-auto flex justify-between items-center max-w-5xl">
            <h1 class="text-md font-bold tracking-wider uppercase text-blue-400"> Portal USFA</h1>
            
            <div class="flex gap-4 text-xs font-semibold uppercase items-center">
                <a href="{{ route('home') }}" class="hover:text-blue-400 transition {{ Route::is('home') ? 'text-blue-400 font-bold' : '' }}">Inicio</a>
                <a href="{{ route('sobre-mi') }}" class="hover:text-blue-400 transition {{ Route::is('sobre-mi') ? 'text-blue-400 font-bold' : '' }}">Sobre Mí</a>
                <a href="{{ route('materias') }}" class="hover:text-blue-400 transition {{ Route::is('materias') ? 'text-blue-400 font-bold' : '' }}">Materias</a>
                <a href="{{ route('estudiantes.index') }}" class="hover:text-blue-400 transition {{ Route::is('estudiantes.index') ? 'text-blue-400 font-bold' : '' }}">Estudiantes</a>
                <a href="{{ route('contacto') }}" class="hover:text-blue-400 transition {{ Route::is('contacto') ? 'text-blue-400 font-bold' : '' }}">Contacto</a>
                
                <a href="{{ route('foro.index') }}" class="bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded text-white transition normal-case">Ir al Foro</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto max-w-5xl p-6 flex-grow">
        @yield('content')
    </div>

    <footer class="bg-gray-950 text-gray-500 text-center py-4 text-xs border-t border-gray-800 mt-auto">
        <p>&copy; 2026 - Kevin Brayan Colque Chuquimia</p>
    </footer>

</body>
</html>