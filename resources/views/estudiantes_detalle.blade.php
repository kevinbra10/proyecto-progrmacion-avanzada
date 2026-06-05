@extends('Layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-4 space-y-6">
    

    <a href="{{ route('estudiantes.index') }}" class="inline-flex items-center text-xs font-bold uppercase text-gray-400 hover:text-white transition gap-1">
        ← Volver al listado
    </a>


    <div class="bg-gray-800 rounded-xl shadow-2xl border border-gray-700 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-800 to-slate-900 p-6 border-b border-gray-700 sm:flex sm:justify-between sm:items-center">
            <div class="space-y-1">
                <span class="text-xs font-bold uppercase tracking-widest text-blue-400">{{ $titulo }}</span>
                <h2 class="text-2xl font-black text-white uppercase">{{ $estudiante->getNombre() }}</h2>
            </div>
            <div class="mt-4 sm:mt-0 bg-blue-600/10 border border-blue-500/20 px-4 py-2 rounded-xl text-center">
                <span class="block text-[10px] uppercase tracking-wider text-gray-400 font-bold">Promedio General</span>
                <span class="text-xl font-black text-blue-400">{{ $estudiante->calcularPromedio() }}</span>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs bg-gray-900/30">
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-750">
                <span class="block text-gray-500 font-bold uppercase">Matrícula</span>
                <span class="text-white font-medium mt-0.5 block">{{ $estudiante->getMatricula() }}</span>
            </div>
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-750">
                <span class="block text-gray-500 font-bold uppercase">Carrera</span>
                <span class="text-white font-medium mt-0.5 block">{{ $estudiante->getCarrera() }}</span>
            </div>
            <div class="bg-gray-900 p-3 rounded-lg border border-gray-750">
                <span class="block text-gray-500 font-bold uppercase">Rol del Sistema</span>
                <span class="text-blue-400 font-bold mt-0.5 block uppercase tracking-wide">{{ $estudiante->getRol() }}</span>
            </div>
        </div>

        
        <div class="p-6 space-y-3">
            <h3 class="text-sm font-bold uppercase tracking-wide text-gray-300">Materias Inscritas</h3>
            
            <div class="overflow-x-auto rounded-xl border border-gray-700">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-900 text-gray-300 uppercase font-bold tracking-wider border-b border-gray-700">
                            <th class="p-3.5">Materia</th>
                            <th class="p-3.5 text-center">Código</th>
                            <th class="p-3.5 text-center">Créditos</th>
                            <th class="p-3.5 text-center">Nota Obtenida</th>
                            <th class="p-3.5 text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 text-gray-300">
                        @foreach($estudiante->getMaterias() as $materia)
                            <tr class="hover:bg-gray-750 transition">
                                <td class="p-3.5 font-semibold text-white">{{ $materia->getNombre() }}</td>
                                <td class="p-3.5 text-center text-gray-400 font-mono">{{ $materia->getCodigo() }}</td>
                                <td class="p-3.5 text-center">{{ $materia->getCreditos() }}</td>
                                <td class="p-3.5 text-center font-bold text-sm {{ $materia->estaAprobada() ? 'text-green-400' : 'text-red-400' }}">
                                    {{ $materia->getNotaObtenida() }}
                                </td>
                                <td class="p-3.5 text-center">
                                    @if($materia->estaAprobada())
                                        <span class="bg-green-950/60 text-green-400 px-2.5 py-1 rounded-full font-bold uppercase text-[10px]">
                                            {{ $materia->getEstado() }}
                                        </span>
                                    @else
                                        <span class="bg-red-950/60 text-red-400 px-2.5 py-1 rounded-full font-bold uppercase text-[10px]">
                                            {{ $materia->getEstado() }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection