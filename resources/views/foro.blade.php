<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet - Foro Universitario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <nav class="bg-blue-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">🏛️ PORTAL INTRANET UNIVERSITARIO</h1>
            <div class="flex items-center space-x-4">
                <a href="{{ route('login.index') }}" class="text-sm bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded font-medium shadow">Cerrar Sesion</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto max-w-6xl mt-6 px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <div class="md:col-span-1 bg-white p-5 rounded-lg shadow border-t-4 border-blue-600 h-fit">
            <div class="text-center mb-4">
                <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-full mx-auto flex items-center justify-center text-2xl font-bold mb-2">
                    U
                </div>
                <h3 class="font-bold text-gray-900">{{ session('estudiante_nombre', 'Estudiante') }}</h3>
                <p class="text-xs text-gray-500">Ingenieria de Sistemas</p>
            </div>
            <hr class="my-3">
            <div class="space-y-2 text-sm text-gray-600 mb-4">
                <p><strong>Matricula:</strong> {{ session('estudiante_matricula', '2026-SYS') }}</p>
                <p><strong>Semestre:</strong> 5to Semestre</p>
                <p><strong>Estado:</strong> Regular</p>
            </div>
            <hr class="my-3">
            
            <a href="{{ route('home') }}" class="block text-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-xs uppercase shadow transition duration-200 mb-2">
                Sobre el Creador
            </a>
            <a href="{{ route('estudiantes.index') }}" class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs uppercase shadow transition duration-200">
             Ver Notas (POO)
            </a>
        </div>

        <div class="md:col-span-3">
            
            <!-- ALERTAS DINAMICAS -->
            @if(session('mensaje'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4 text-sm font-medium shadow-sm">
                    {{ session('mensaje') }}
                </div>
            @endif

            @if(session('eliminar'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4 text-sm font-medium shadow-sm">
                    {{ session('eliminar') }}
                </div>
            @endif
            
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h2 class="text-base font-bold mb-3 text-gray-800">Nueva publicacion en la comunidad</h2>
                
                <form action="{{ route('foro.guardar') }}" method="POST">
                    @csrf
                    <textarea name="contenido" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" rows="3" placeholder="Escribe un anuncio, duda o aviso para la carrera..." required></textarea>
                    
                    <div class="flex justify-between items-center mt-3">
                        <select name="categoria" class="p-2 border border-gray-300 rounded-lg text-sm bg-gray-50">
                            <option value="General">General</option>
                            <option value="Tareas / Dudas">Tareas / Dudas</option>
                            <option value="Avisos">Avisos</option>
                        </select>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg text-sm transition duration-200 shadow">
                            Publicar Contenido
                        </button>
                    </div>
                </form>
            </div>

            <h2 class="text-lg font-bold mb-4 text-gray-700">Muro de Novedades</h2>

            @if($publicaciones->isEmpty())
                <div class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
                    <p>No hay publicaciones en el muro todavia. Inicia la conversacion!</p>
                </div>
            @else
                @foreach($publicaciones as $pub)
                    <div class="bg-white p-5 rounded-lg shadow mb-4 border-l-4 border-blue-600 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-bold text-gray-900 text-sm">{{ $pub->estudiante_nombre ?? 'Usuario' }}</span>
                                <span class="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded-full font-medium">{{ $pub->categoria }}</span>
                            </div>
                            <p class="text-gray-700 text-sm mt-1">{{ $pub->contenido }}</p>
                        </div>
                        
                        <div class="flex justify-between items-center mt-4 pt-2 border-t border-gray-100">
                            <span class="text-xs text-gray-400">Enviado: {{ $pub->created_at }}</span>
                            
                            <form action="{{ route('foro.eliminar', $pub->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta publicacion?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-semibold uppercase tracking-wider">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

</body>
</html>