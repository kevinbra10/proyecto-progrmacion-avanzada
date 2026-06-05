<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reddit USFA - Foro Universitario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <nav class="bg-blue-800 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">🏛️ PORTAL INTRANET UNIVERSITARIO</h1>
            <a href="{{ route('login.index') }}" class="text-sm bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded font-medium shadow">Cerrar Sesion</a>
        </div>
    </nav>

    <!-- BARRA DE BÚSQUEDA AVANZADA (TIPO REDDIT) -->
    <div class="bg-white border-b p-4 shadow-sm">
        <form action="{{ route('foro.index') }}" method="GET" class="container mx-auto max-w-6xl flex gap-2">
            <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="🔍 Buscar publicaciones, categorías o compañeros..." class="w-full p-3 border rounded-lg text-sm bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-sm font-bold shadow">Buscar</button>
            @if(request('buscar') || request('categoria'))
                <a href="{{ route('foro.index') }}" class="bg-gray-200 text-gray-700 px-4 py-3 rounded-lg text-sm font-medium flex items-center">Limpiar</a>
            @endif
        </form>
    </div>

    <div class="container mx-auto max-w-6xl mt-6 px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- SIDEBAR IZQUIERDO -->
        <div class="md:col-span-1 bg-white p-5 rounded-lg shadow h-fit space-y-4">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full mx-auto flex items-center justify-center text-xl font-bold mb-2">U</div>
                <h3 class="font-bold text-gray-900 text-sm">{{ session('estudiante_nombre') }}</h3>
                <p class="text-xs text-blue-600 font-semibold">{{ session('estudiante_carrera') }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ session('estudiante_semestre') }}</p>
            </div>
            <hr>
            
            <!-- FILTROS POR CATEGORÍA -->
            <div class="space-y-1">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Categorias</p>
                <a href="{{ route('foro.index', ['categoria' => 'General']) }}" class="block px-3 py-2 rounded text-sm {{ request('categoria') == 'General' ? 'bg-blue-100 text-blue-700 font-bold' : 'hover:bg-gray-100' }}">🌐 General</a>
                <a href="{{ route('foro.index', ['categoria' => 'Tareas / Dudas']) }}" class="block px-3 py-2 rounded text-sm {{ request('categoria') == 'Tareas / Dudas' ? 'bg-blue-100 text-blue-700 font-bold' : 'hover:bg-gray-100' }}">📝 Tareas / Dudas</a>
                <a href="{{ route('foro.index', ['categoria' => 'Avisos']) }}" class="block px-3 py-2 rounded text-sm {{ request('categoria') == 'Avisos' ? 'bg-blue-100 text-blue-700 font-bold' : 'hover:bg-gray-100' }}">📢 Avisos</a>
            </div>
            <hr>

            <!-- SECCIONES EXCLUSIVAS -->
            <a href="{{ route('foro.mis_posts') }}" class="block text-center bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 rounded text-xs uppercase shadow transition">
                📂 Mis Publicaciones
            </a>
            <a href="{{ route('home') }}" class="block text-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded text-xs uppercase shadow transition">
                    👨‍💻 Sobre el Creador
                </a>
            
        </div>

        <!-- CONTENIDO DEL MURO -->
        <div class="md:col-span-3 space-y-4">
            
            @if(session('mensaje'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded text-sm shadow-sm">{{ session('mensaje') }}</div>
            @endif
            @if(session('eliminar'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded text-sm shadow-sm">{{ session('eliminar') }}</div>
            @endif
            
            <!-- CREAR POST -->
            <div class="bg-white p-6 rounded-lg shadow">
                <form action="{{ route('foro.guardar') }}" method="POST" class="space-y-3">
                    @csrf
                    <textarea name="contenido" class="w-full p-3 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="¿Qué quieres anunciar o preguntar en la facultad...?" required></textarea>
                    <div class="flex justify-between items-center">
                        <select name="categoria" class="p-2 border rounded-lg text-sm bg-gray-50">
                            <option value="General">General</option>
                            <option value="Tareas / Dudas">Tareas / Dudas</option>
                            <option value="Avisos">Avisos</option>
                        </select>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg text-sm shadow">Publicar</button>
                    </div>
                </form>
            </div>

            <!-- ENUMERACIÓN DE POSTS -->
            @foreach($publicaciones as $pub)
                <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-600">
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <span class="font-bold text-gray-900 text-sm">{{ $pub->estudiante_nombre }}</span>
                            <span class="text-xs text-gray-400 block">Publicado: {{ $pub->created_at }}</span>
                        </div>
                        <span class="text-xs bg-blue-50 text-blue-700 px-3 py-1 rounded-full font-bold">{{ $pub->categoria }}</span>
                    </div>
                    <p class="text-gray-700 text-sm mt-2 font-medium">{{ $pub->contenido }}</p>

                    <!-- BOTÓN ELIMINAR (SOLO PARA EL DUEÑO) -->
                    <div class="flex justify-end mt-2">
                        @if($pub->estudiante_id == session('estudiante_id'))
                            <form action="{{ route('foro.eliminar', $pub->id) }}" method="POST" onsubmit="return confirm('¿Seguro de borrar tu publicacion?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold uppercase">Eliminar</button>
                            </form>
                        @endif
                    </div>

                    <!-- CAJA DE RESPUESTAS HILADAS (TIPO REDDIT) -->
                    <div class="mt-4 bg-gray-50 p-3 rounded-lg border space-y-3">
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Respuestas del Hilo:</p>
                        
                        @foreach($pub->respuestas as $resp)
                            <div class="border-l-2 border-gray-300 pl-3 py-1 text-xs">
                                <strong class="text-gray-800">{{ $resp->estudiante_nombre }}:</strong>
                                <span class="text-gray-600">{{ $resp->contenido }}</span>
                            </div>
                        @endforeach

                        <!-- FORMULARIO PARA RESPONDER -->
                        <form action="{{ route('foro.responder', $pub->id) }}" method="POST" class="flex gap-2 mt-2">
                            @csrf
                            <input type="text" name="contenido" placeholder="Escribe una respuesta publica..." class="w-full p-2 border rounded text-xs bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                            <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-3 py-2 rounded text-xs font-bold">Responder</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</body>
</html>