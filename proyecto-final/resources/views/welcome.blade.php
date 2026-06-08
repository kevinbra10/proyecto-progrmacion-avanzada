@extends('Layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8">

    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 p-8 text-center space-y-6">
        
  
        <div class="space-y-2">
            <h2 class="text-2xl font-black text-white uppercase tracking-tight">Kevin Colque</h2>
            <p class="text-sm text-blue-400 font-medium">Ingeniería de Sistemas · 5to Semestre</p>
        </div>


        <div class="inline-block bg-gray-950 border border-gray-750 px-4 py-2 rounded-xl">
            <span class="text-xs font-mono font-bold tracking-wider text-gray-300">SIS-500 — Programación Avanzada · 2026</span>
        </div>

        <p class="text-xs text-gray-400 max-w-sm mx-auto leading-relaxed">
            Prueva del proyecto - Programacion avanzada
        </p>


        <div class="pt-4 flex flex-col sm:flex-row justify-center gap-3">
            <a href="{{ route('foro.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-xs px-6 py-3 rounded-xl transition uppercase tracking-wider shadow-lg">
                Ingresar al Foro Universitario
            </a>
            <a href="{{ route('sobre-mi') }}" class="bg-gray-900 hover:bg-gray-750 border border-gray-700 text-gray-300 font-extrabold text-xs px-6 py-3 rounded-xl transition uppercase tracking-wider shadow">
                Ver Mi Perfil
            </a>
        </div>

    </div>
</div>
@endsection