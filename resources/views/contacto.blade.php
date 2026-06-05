@extends('Layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-4">
    <section class="bg-gray-800 p-6 rounded-xl shadow-xl border border-gray-700 space-y-4">
        <h3 class="text-lg font-bold uppercase tracking-wide text-blue-400">✉️ Contacto</h3>
        
        <form action="{{ route('contacto.procesar') }}" method="POST" class="space-y-4 text-sm">
            @csrf
            <div>
                <label for="nombre" class="block font-semibold mb-1 text-gray-300">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tu nombre" required>
            </div>
            
            <div>
                <label for="email" class="block font-semibold mb-1 text-gray-300">Correo electrónico:</label>
                <input type="email" id="email" name="email" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="tu@correo.com" required>
            </div>
            
            <div>
                <label for="mensaje" class="block font-semibold mb-1 text-gray-300">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" class="w-full p-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Escribe tu mensaje aquí..." required></textarea>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg uppercase tracking-wider shadow-md transition">
                Enviar Mensaje
            </button>
        </form>
    </section>
</div>
@endsection