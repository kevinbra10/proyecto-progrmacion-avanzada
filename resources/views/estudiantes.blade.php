<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet - Notas de Estudiantes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <nav class="bg-blue-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">📊 CENTRAL DE CALIFICACIONES (POO)</h1>
            <a href="{{ route('foro.index') }}" class="text-sm bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded font-medium shadow">Volver al Foro</a>
        </div>
    </nav>

    <main class="container mx-auto max-w-5xl mt-8 px-4">
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Control de Rendimiento Academico</h2>
            <p class="text-sm text-gray-500">Esta tabla mapea los alumnos de MySQL y calcula sus estados usando instancias de objetos en PHP.</p>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-800 text-white text-sm uppercase">
                        <th class="p-4">Estudiante</th>
                        <th class="p-4">Matricula</th>
                        <th class="p-4">Materia Asignada</th>
                        <th class="p-4 text-center">Nota Final</th>
                        <th class="p-4 text-center">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-200">
                    @if(empty($estudiantesProcesados))
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">No hay estudiantes registrados en el sistema todavia.</td>
                        </tr>
                    @else
                        @foreach($estudiantesProcesados as $alumno)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-bold text-gray-900">{{ $alumno->nombre }}</td>
                                <td class="p-4 text-gray-600">{{ $alumno->matricula }}</td>
                                <td class="p-4 text-gray-600 italic">{{ $alumno->materia }}</td>
                                <td class="p-4 text-center font-bold text-lg {{ $alumno->nota >= 51 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $alumno->nota }}
                                </td>
                                <td class="p-4 text-center">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $alumno->estado == 'Aprobado' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $alumno->estado }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>