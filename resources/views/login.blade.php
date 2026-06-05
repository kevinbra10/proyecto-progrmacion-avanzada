<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso - Intranet Universitaria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 font-sans p-4 min-h-screen flex items-center justify-center">

    <div class="container mx-auto max-w-4xl grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-8 rounded-xl shadow-2xl">
        
        <div class="border-b md:border-b-0 md:border-r border-gray-200 pb-6 md:pb-0 md:pr-8">
            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-800 uppercase tracking-tight">Iniciar Sesion</h2>
                <p class="text-xs text-gray-500 mt-1">Ingresa tu correo y matricula para entrar</p>
            </div>

            <form action="{{ route('login.procesar') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="accion" value="ingresar">

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Correo Electronico</label>
                    <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. kevin@usfa.edu.bo" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Numero de Matricula</label>
                    <input type="text" name="matricula" class="w-full p-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. 2026-SYS" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg text-sm uppercase shadow-md transition">
                    Entrar al Foro
                </button>
            </form>
            
            @if(session('error'))
                <p class="text-red-500 text-xs font-bold mt-3 text-center">{{ session('error') }}</p>
            @endif
        </div>

        <div>
            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-800 uppercase tracking-tight">Crear Cuenta</h2>
                <p class="text-xs text-gray-500 mt-1">Registrate e ingresa tus notas del semestre</p>
            </div>

            <form action="{{ route('login.procesar') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="accion" value="registrar">

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Nombre Completo</label>
                    <input type="text" name="nombre" class="w-full p-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. Kevin Colque" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Correo Electronico</label>
                    <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. kevin@usfa.edu.bo" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Numero de Matricula</label>
                    <input type="text" name="matricula" class="w-full p-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. 2026-SYS" required>
                </div>

                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200 space-y-3">
                    <p class="text-xs font-bold text-gray-600 uppercase tracking-wider">Notas del Semestre:</p>
                    
                    <div class="flex items-center justify-between gap-4">
                        <span class="text-xs font-medium text-gray-700 w-2/3">SIS-500 - Programacion Avanzada</span>
                        <input type="number" name="nota_materia_1" min="0" max="100" class="w-20 p-2 border border-gray-300 rounded text-center text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nota" required>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-xs font-medium text-gray-700 w-2/3">SIS-520 - Base de Datos II</span>
                        <input type="number" name="nota_materia_2" min="0" max="100" class="w-20 p-2 border border-gray-300 rounded text-center text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nota" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg text-sm uppercase shadow-md transition">
                    Registrar e Inscribir Materias
                </button>
            </form>
        </div>

    </div>

</body>
</html>