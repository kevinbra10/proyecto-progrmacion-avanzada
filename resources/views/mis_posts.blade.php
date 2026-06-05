<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Publicaciones - Intranet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <nav class="bg-gray-900 text-white p-4 shadow-md mb-6">
        <div class="container mx-auto flex justify-between items-center max-w-4xl">
            <h1 class="text-lg font-bold">REVISIÓN DE MIS ENTRADAS</h1>
            <a href="{{ route('foro.index') }}" class="text-xs bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded font-bold uppercase">Volver al Muro</a>
        </div>
    </nav>

    <main class="container mx-auto max-w-4xl px-4">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Historial de {{ session('estudiante_nombre') }}</h2>

        @if($publicaciones->isEmpty())
            <div class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
                <p>Aun no has realizado ninguna publicacion en el foro.</p>
            </div>
        @else
            @foreach($publicaciones as $pub)
                <div class="bg-white p-5 rounded-lg shadow mb-4 border-l-4 border-yellow-500">
                    <div class="flex justify-between text-xs text-gray-400 mb-1">
                        <span>Categoría: <strong>{{ $pub->categoria }}</strong></span>
                        <span>{{ $pub->created_at }}</span>
                    </div>
                    <p class="text-gray-800 text-sm font-medium mb-3">{{ $pub->contenido }}</p>

                    <div class="bg-gray-50 p-3 rounded border space-y-2">
                        <p class="text-xs font-bold text-gray-500 uppercase">Respuestas que recibiste:</p>
                        @if($pub->respuestas->isEmpty())
                            <p class="text-xs text-gray-400 italic">Nadie ha respondido a este post todavia.</p>
                        @else
                            @foreach($pub->respuestas as $resp)
                                <div class="text-xs border-b border-gray-100 pb-1">
                                    <span class="font-bold text-blue-600">{{ $resp->estudiante_nombre }}:</span> 
                                    <span class="text-gray-700">{{ $resp->contenido }}</span>
                                    <span class="text-[10px] text-gray-400 ml-2">({{ $resp->created_at }})</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </main>

</body>
</html>