@extends('Layouts.app')

@section('content')
<div class="space-y-8 mt-4">
    <section class="bg-gray-800 p-6 rounded-xl shadow-xl border border-gray-700 flex flex-col md:flex-row gap-6 items-center">
        <div class="flex-shrink-0">
            <img src="{{ asset('3135768.png') }}" alt="Foto de Kevin Colque" class="w-32 h-32 rounded-full border-4 border-blue-500 shadow-md object-cover bg-gray-700">
        </div>
        <div class="space-y-2 text-center md:text-left">
            <h2 class="text-2xl font-extrabold text-white tracking-tight uppercase">Kevin Brayan Colque Chuquimia</h2>
            <p class="text-blue-400 font-medium text-sm">🎓 Carrera: <span class="text-white font-normal">Ingeniería de Sistemas</span></p>
            <p class="text-blue-400 font-medium text-sm">📅 Semestre: <span class="text-white font-normal">Quinto Semestre</span></p>
            <div class="pt-2">
                <p class="text-xs italic text-gray-400 bg-gray-900/50 p-3 rounded-lg inline-block border-l-4 border-blue-500">
                    "Al final todo estara bien, si no esta bien esque no emos llegado al final."
                </p>
            </div>
        </div>
    </section>

    <section class="bg-gray-800 p-6 rounded-xl shadow-xl border border-gray-700 space-y-4">
        <h3 class="text-lg font-bold uppercase tracking-wide text-blue-400">🛠️ Habilidades</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-700 flex items-center gap-2">🚀 Lógica de programación (HTML, un poco de PHP)</div>
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-700 flex items-center gap-2">💾 Manejo básico de Bases de Datos (SQL)</div>
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-700 flex items-center gap-2">👥 Trabajo en equipo y colaboración</div>
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-700 flex items-center gap-2">🧩 Resolución de problemas complejos</div>
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-700 flex items-center gap-2">🧠 Adaptabilidad y aprendizaje rápido</div>
        </div>
    </section>
</div>
@endsection