<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reddit USFA - Foro Universitario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-gray-100 font-sans min-h-screen">

    <nav class="bg-gray-800 text-white p-4 shadow-lg sticky top-0 z-50 border-b border-gray-700">
        <div class="container mx-auto flex justify-between items-center max-w-6xl">
            <h1 class="text-md font-bold tracking-wider uppercase text-blue-400 flex items-center gap-2">
                FORO UNIVERSITARIO
            </h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-xs font-semibold uppercase hover:text-blue-400 transition">Volver al Inicio</a>
                <a href="{{ route('login.index') }}" class="text-xs bg-red-600/20 hover:bg-red-600/40 border border-red-500/30 px-3 py-1.5 rounded font-bold uppercase tracking-wider text-red-400 shadow transition">Cerrar Sesion</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto max-w-6xl mt-6 px-4 space-y-6">

        <div class="bg-gray-800 p-4 rounded-xl border border-gray-700 shadow-md">
            <form action="{{ route('foro.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 select-none"></span>
                    <input 
                        type="text" 
                        name="buscar" 
                        value="{{ request('buscar') }}"
                        placeholder="Buscar publicaciones por titulo o contenido..." 
                        class="w-full bg-gray-950 border border-gray-750 rounded-xl pl-10 pr-4 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition"
                    >
                </div>

                <div class="sm:w-56">
                    <select 
                        name="categoria" 
                        onchange="this.form.submit()"
                        class="w-full bg-gray-950 border border-gray-750 rounded-xl px-3 py-2.5 text-xs text-gray-300 focus:outline-none focus:border-blue-500 transition cursor-pointer font-medium"
                    >
                        <option value="" {{ request('categoria') == '' ? 'selected' : '' }}>Ver Todo el Tablon</option>
                        <option value="General" {{ request('categoria') == 'General' ? 'selected' : '' }}>Categoria: General</option>
                        <option value="Avisos" {{ request('categoria') == 'Avisos' ? 'selected' : '' }}>Categoria: Avisos</option>
                        <option value="Tareas / Dudas" {{ request('categoria') == 'Tareas / Dudas' ? 'selected' : '' }}>Categoria: Tareas / Dudas</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold uppercase tracking-wider px-5 py-2.5 rounded-xl transition shadow-md sm:hidden">
                    Filtrar
                </button>
            </form>
        </div>

        <!-- FILTRO POR CARRERAS -->
        <div class="bg-gray-800 p-4 rounded-xl border border-gray-700 shadow-md mb-2">
            <form action="{{ route('foro.index') }}" method="GET" class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div>
                    <h3 class="text-xs font-bold text-white uppercase tracking-wider">Filtrar por Especialidad</h3>
                    <p class="text-[11px] text-gray-400">Mira solo los aportes de una carrera especifica</p>
                </div>
                
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <select name="carrera" class="bg-gray-950 border border-gray-700 text-gray-300 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 w-full sm:w-48">
                        <option value="">Todas las carreras</option>
                        @foreach($carreras as $car)
                            <option value="{{ $car }}" {{ request('carrera') == $car ? 'selected' : '' }}>
                                {{ $car }}
                            </option>
                        @endforeach
                    </select>
                    
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs px-4 py-2 rounded-lg transition shadow">
                        Filtrar
                    </button>
                    
                    @if(request('carrera'))
                        <a href="{{ route('foro.index', array_merge(request()->except('carrera'), ['carrera' => null])) }}" class="bg-gray-700 hover:bg-gray-650 text-gray-400 hover:text-white text-xs px-3 py-2 rounded-lg transition border border-gray-600">
                            X
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            
            <div class="md:col-span-1 bg-gray-800 p-5 rounded-xl border border-gray-700 shadow h-fit space-y-4">
                <div class="text-center">
                    <div class="w-14 h-14 bg-blue-600/20 text-blue-400 rounded-full mx-auto flex items-center justify-center text-xl font-bold mb-3 border border-blue-500/20">
                        {{ substr(session('estudiante_nombre', 'U'), 0, 1) }}
                    </div>
                    <h3 class="font-bold text-white text-sm tracking-tight uppercase leading-tight">{{ session('estudiante_nombre', 'Estudiante Invitado') }}</h3>
                    <p class="text-[11px] text-blue-400 font-bold mt-1 uppercase">{{ session('estudiante_carrera', 'Ing. de Sistemas') }}</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">{{ session('estudiante_semestre', '5to Semestre') }}</p>
                </div>
                
                <hr class="border-gray-700">

                <div class="space-y-2 pt-1">
                    <a href="{{ route('foro.mis_posts') }}" class="block text-center bg-gray-900 hover:bg-gray-750 text-gray-300 border border-gray-700 font-bold py-2 rounded-xl text-[11px] uppercase tracking-wide shadow transition">
                         Mis Publicaciones
                    </a>
                    <a href="{{ route('home') }}" class="block text-center bg-green-600/20 hover:bg-green-600/40 text-green-400 border border-green-500/30 font-bold py-2 rounded-xl text-[11px] uppercase tracking-wide shadow transition">
                         Sobre el Creador
                    </a>
                </div>
            </div>

            <div class="md:col-span-3 space-y-4">
                
                <div class="bg-gray-800 p-5 rounded-xl border border-gray-700 shadow-xl">
                    <form action="{{ route('foro.guardar') }}" method="POST" class="space-y-3">
                        @csrf
                        <textarea name="contenido" class="w-full p-3 bg-gray-950 border border-gray-750 rounded-xl text-xs text-white placeholder-gray-500 outline-none focus:border-blue-500 transition" rows="3" placeholder="Que quieres anunciar o preguntar en la facultad..." required></textarea>
                        <div class="flex justify-between items-center">
                            <select name="categoria" class="p-2 bg-gray-950 border border-gray-750 rounded-lg text-xs text-gray-300 font-medium">
                                <option value="General">General</option>
                                <option value="Tareas / Dudas">Tareas / Dudas</option>
                                <option value="Avisos">Avisos</option>
                            </select>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider px-5 py-2.5 rounded-xl shadow-md transition">Publicar</button>
                        </div>
                    </form>
                </div>

                @forelse($publicaciones as $pub)
                    <div class="bg-gray-800 p-5 rounded-xl border border-gray-700 shadow-xl space-y-3">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center text-xs font-bold text-gray-400 border border-gray-750">
                                    {{ substr($pub->estudiante_nombre, 0, 1) }}
                                </div>
                                <div>
                                    <span class="font-bold text-white text-xs block leading-tight">{{ $pub->estudiante_nombre }}</span>
                                    <span class="text-[10px] text-gray-500 block mt-0.5">Publicado: {{ $pub->created_at }}</span>
                                </div>
                            </div>
                            
                            @if($pub->categoria == 'Avisos')
                                <span class="text-[9px] bg-red-500/10 border border-red-500/20 text-red-400 px-2.5 py-1 rounded-md font-black uppercase tracking-wider">Avisos</span>
                            @elseif($pub->categoria == 'Tareas / Dudas')
                                <span class="text-[9px] bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 px-2.5 py-1 rounded-md font-black uppercase tracking-wider">Tareas / Dudas</span>
                            @else
                                <span class="text-[9px] bg-blue-500/10 border border-blue-500/20 text-blue-400 px-2.5 py-1 rounded-md font-black uppercase tracking-wider">General</span>
                            @endif
                        </div>

                        <p class="text-gray-300 text-xs leading-relaxed font-medium pt-1">{{ $pub->contenido }}</p>

                        <div class="flex justify-end border-b border-gray-700/50 pb-2">
                            @if($pub->estudiante_id == session('estudiante_id'))
                                <form action="{{ route('foro.eliminar', $pub->id) }}" method="POST" onsubmit="return confirm('Seguro de borrar tu publicacion?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-500 text-[10px] font-bold uppercase tracking-wider transition">Eliminar Post</button>
                                </form>
                            @endif
                        </div>

                        <div class="bg-gray-950/40 p-4 rounded-xl border border-gray-750 space-y-3">
                            <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Respuestas del Hilo:</p>
                            
                            <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                                @forelse($pub->respuestas as $resp)
                                    <div class="bg-gray-900/50 border-l-2 border-gray-600 pl-3 py-1.5 text-xs rounded-r-lg flex justify-between items-center">
                                        <div>
                                            <strong class="text-blue-400 font-bold block text-[11px]">
                                                {{ $resp->estudiante_id == session('estudiante_id') ? session('estudiante_nombre') : ($resp->estudiante_nombre ?? 'Companero USFA') }}:
                                            </strong>
                                            <span class="text-gray-300 block mt-0.5 text-[11px]">{{ $resp->contenido }}</span>
                                        </div>
                                        
                                        @if($resp->estudiante_id == session('estudiante_id'))
                                            <form action="{{ route('foro.eliminar_respuesta', $resp->id) }}" method="POST" onsubmit="return confirm('Seguro de eliminar tu comentario?');" class="ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-500 font-bold text-[9px] uppercase tracking-wider transition">
                                                    Borrar
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @empty
                                    <p class="text-[11px] text-gray-600 italic pl-1">Sin respuestas en este debate todavia...</p>
                                @endforelse
                            </div>

                            <form action="{{ route('foro.responder', $pub->id) }}" method="POST" class="flex gap-2 pt-1.5">
                                @csrf
                                <input type="text" name="contenido" placeholder="Escribe una respuesta publica..." class="w-full p-2 bg-gray-950 border border-gray-750 rounded-xl text-xs text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 transition" required>
                                <button type="submit" class="bg-gray-800 hover:bg-gray-750 border border-gray-700 text-gray-300 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition">Responder</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-800 p-8 rounded-xl border border-gray-700 text-center shadow-xl">
                        <p class="text-xs text-gray-500 italic">No existen publicaciones registradas bajo este criterio de filtrado.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    <!-- SCRIPT PROFESIONAL PARA FORZAR REFRESCO AL VOLVER ATRÁS -->
    <script>
        (function () {
            window.onpageshow = function (event) {
                if (event.persisted || (typeof window.performance != "undefined" && window.performance.navigation.type === 2)) {
                    window.location.reload();
                }
            };
        })();
    </script>
</body>
</html>