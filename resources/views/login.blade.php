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
                <p class="text-xs text-gray-500 mt-1">Ingresa tu nombre para acceder al foro universitario</p>
            </div>

            <form action="{{ route('login.procesar') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="accion" value="ingresar">

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Nombre Completo</label>
                    <input type="text" name="nombre" class="w-full p-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. Kevin Colque" required>
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
                <p class="text-xs text-gray-500 mt-1">Registrate ingresando tu carrera y tu semestre actual</p>
            </div>

            <form action="{{ route('login.procesar') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="accion" value="registrar">

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Nombre Completo</label>
                    <input type="text" name="nombre" class="w-full p-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej. Kevin Colque" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Carrera</label>
                    <select name="carrera" class="w-full p-3 border border-gray-300 rounded-lg text-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                        <option value="Ingenieria Comercial">Ingenieria Comercial</option>
                        <option value="Contaduria Publica">Contaduria Publica</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Semestre</label>
                    <select name="semestre" class="w-full p-3 border border-gray-300 rounded-lg text-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1ro Semestre">1ro Semestre</option>
                        <option value="2do Semestre">2do Semestre</option>
                        <option value="3er Semestre">3er Semestre</option>
                        <option value="4to Semestre">4to Semestre</option>
                        <option value="5to Semestre">5to Semestre</option>
                        <option value="6to Semestre">6to Semestre</option>
                        <option value="7mo Semestre">7mo Semestre</option>
                        <option value="8vo Semestre">8vo Semestre</option>
                        <option value="9no Semestre">9no Semestre</option>
                        <option value="10mo Semestre">10mo Semestre</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg text-sm uppercase shadow-md transition">
                    Registrar e Ingresar
                </button>
            </form>
        </div>

    </div>

</body>
</html>