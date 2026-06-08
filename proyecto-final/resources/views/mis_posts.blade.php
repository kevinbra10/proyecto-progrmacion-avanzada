<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Publicaciones - Intranet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-gray-100 font-sans min-h-screen">

    <nav class="bg-gray-800 text-white p-4 shadow-lg sticky top-0 z-50 border-b border-gray-700">
        <div class="container mx-auto flex justify-between items-center max-w-6xl">
            <h1 class="text-md font-bold tracking-wider uppercase text-blue-400">
                MIS PUBLICACIONES
            </h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('foro.index') }}" class="text-xs font-semibold uppercase hover:text-blue-400 transition">Volver al Muro</a>
                <a href="{{ route('login.index') }}" class="text-xs bg-red-600/20 hover:bg-red-600/40 border border-red-500/30 px-3 py-1.5 rounded font-bold uppercase tracking-wider text-red-400 shadow transition">Cerrar Sesion</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto max-w-4xl px-4 mt-6">
        <h2 class="text-xl font-bold mb-4 text-white">Historial de {{ session('estudiante_nombre') }}</h2>

        @if($publicaciones->isEmpty())
            <div class="bg-gray-800 p-8 rounded-xl border border-gray-700 text-center shadow-xl">
                <p class="text-xs text-gray-500 italic">Aun no has realizado ninguna publicacion en el foro ni has participado en debates.</p>
            </div>
        @else
            @foreach($publicaciones as $pub)
                <div class="bg-gray-800 p-5 rounded-xl border border-gray-700 shadow-xl mb-4 space-y-3">
                    
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 bg-gray-950 rounded-full flex items-center justify-center text-xs font-bold text-blue-400 border border-gray-750">
                                {{ substr($pub->estudiante_nombre ?? 'U', 0, 1) }}
                            </div>
                            <div>
                                <span class="font-bold text-white text-xs block leading-tight">
                                    {{ $pub->estudiante_id == session('estudiante_id') ? 'Tu (Tu Publicacion)' : ($pub->estudiante_nombre ?? 'Companero de la Facultad') }}
                                </span>
                                <span class="text-[10px] text-gray-500 block mt-0.5">Publicado: {{ $pub->created_at }}</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            @if($pub->estudiante_id == session('estudiante_id'))
                                <form action="{{ route('foro.eliminar', $pub->id) }}" method="POST" onsubmit="return confirm('Seguro que deseas eliminar esta publicacion y todas sus respuestas?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-500 font-bold text-[9px] uppercase tracking-wider transition bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 px-2.5 py-1 rounded-md">
                                        Eliminar Post
                                    </button>
                                </form>
                            @endif

                            @if($pub->categoria == 'Avisos')
                                <span class="text-[9px] bg-red-500/10 border border-red-500/20 text-red-400 px-2.5 py-1 rounded-md font-black uppercase tracking-wider">{{ $pub->categoria }}</span>
                            @elseif($pub->categoria == 'Tareas / Dudas')
                                <span class="text-[9px] bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 px-2.5 py-1 rounded-md font-black uppercase tracking-wider">{{ $pub->categoria }}</span>
                            @else
                                <span class="text-[9px] bg-blue-500/10 border border-blue-500/20 text-blue-400 px-2.5 py-1 rounded-md font-black uppercase tracking-wider">{{ $pub->categoria }}</span>
                            @endif
                        </div>
                    </div>

                    <p class="text-gray-300 text-xs leading-relaxed font-medium pt-1">{{ $pub->contenido }}</p>

                    <div class="bg-gray-950/40 p-4 rounded-xl border border-gray-750 space-y-3">
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Respuestas que recibiste:</p>
                        
                        <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                            @forelse($pub->respuestas as $resp)
                                <div class="bg-gray-900/50 border-l-2 border-gray-600 pl-3 py-1.5 text-xs rounded-r-lg flex justify-between items-center">
                                    <div>
                                        <strong class="text-blue-400 font-bold block text-[11px]">
                                            {{ $resp->estudiante_id == session('estudiante_id') ? 'Tu' : ($resp->estudiante_nombre ?? 'Companero USFA') }}:
                                        </strong>
                                        <span class="text-gray-300 block mt-0.5 text-[11px]">{{ $resp->contenido }}</span>
                                        <span class="text-[9px] text-gray-500 block mt-0.5">{{ $resp->created_at }}</span>
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
                                <p class="text-[11px] text-gray-600 italic pl-1">Nadie ha respondido a este post todavia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </main>

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