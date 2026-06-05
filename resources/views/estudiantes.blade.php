@extends('Layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-4 space-y-6">
    <div class="border-b border-gray-700 pb-3">
        <h1 class="text-2xl font-black uppercase text-blue-400 tracking-wide">{{ $titulo }}</h1>
        <p class="text-xs text-gray-400 mt-1">Lista de alumnos registrados y procesados mediante Programación Orientada a Objetos (POO):</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach($estudiantes as $index => $est)
            <div class="bg-gray-800 p-5 rounded-xl border border-gray-700 shadow-xl flex flex-col justify-between hover:border-gray-600 transition">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-blue-600/20 text-blue-400 rounded-full flex items-center justify-center font-bold text-sm">
                            {{ substr($est->getNombre(), 0, 1) }}
                        </div>
                        <h2 class="text-base font-bold text-white uppercase tracking-tight leading-tight">{{ $est->getNombre() }}</h2>
                    </div>
                    
                    <div class="bg-gray-950/40 p-3 rounded-lg border border-gray-750 text-xs space-y-1">
                        <p class="text-gray-400"><strong class="text-blue-400">Carrera:</strong> {{ $est->getCarrera() }}</p>
                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-t border-gray-700/60">
                    <a href="{{ route('estudiantes.detalle', $index) }}" class="w-full text-center block bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-2.5 rounded-lg transition uppercase tracking-wider shadow-md">
                        Ver Historial Académico →
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection