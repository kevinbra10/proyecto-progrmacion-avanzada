@extends('Layouts.app')

@section('content')
<div class="mt-4">
    <section class="bg-gray-800 p-6 rounded-xl shadow-xl border border-gray-700 space-y-4">
        <h3 class="text-lg font-bold uppercase tracking-wide text-blue-400">📚 Mis Materias</h3>
        
        <div class="overflow-x-auto rounded-lg border border-gray-700">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-900 text-gray-300 uppercase text-xs font-bold tracking-wider border-b border-gray-700">
                        <th class="p-4">Materia</th>
                        <th class="p-4 text-center">Créditos</th>
                        <th class="p-4 text-center">Nota</th>
                        <th class="p-4 text-center">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <tr class="hover:bg-gray-750 transition">
                        <td class="p-4 font-semibold text-white">Física Aplicada</td>
                        <td class="p-4 text-center text-gray-300">5</td>
                        <td class="p-4 text-center font-bold text-green-400">75</td>
                        <td class="p-4 text-center"><span class="bg-green-900/60 text-green-400 px-2.5 py-1 rounded-full text-xs font-bold uppercase">Aprobado</span></td>
                    </tr>
                    <tr class="hover:bg-gray-750 transition">
                        <td class="p-4 font-semibold text-white">Desarrollo Sostenible</td>
                        <td class="p-4 text-center text-gray-300">5</td>
                        <td class="p-4 text-center font-bold text-green-400">85</td>
                        <td class="p-4 text-center"><span class="bg-green-900/60 text-green-400 px-2.5 py-1 rounded-full text-xs font-bold uppercase">Aprobado</span></td>
                    </tr>
                    <tr class="hover:bg-gray-750 transition">
                        <td class="p-4 font-semibold text-white">Ciencia de Datos</td>
                        <td class="p-4 text-center text-gray-300">5</td>
                        <td class="p-4 text-center text-gray-400">--</td>
                        <td class="p-4 text-center"><span class="bg-yellow-900/60 text-yellow-400 px-2.5 py-1 rounded-full text-xs font-bold uppercase">En Curso</span></td>
                    </tr>
                    <tr class="hover:bg-gray-750 transition">
                        <td class="p-4 font-semibold text-white">Programación Avanzada</td>
                        <td class="p-4 text-center text-gray-300">5</td>
                        <td class="p-4 text-center text-gray-400">--</td>
                        <td class="p-4 text-center"><span class="bg-yellow-900/60 text-yellow-400 px-2.5 py-1 rounded-full text-xs font-bold uppercase">En Curso</span></td>
                    </tr>
                    <tr class="hover:bg-gray-750 transition">
                        <td class="p-4 font-semibold text-white">Prácticas Profesionales</td>
                        <td class="p-4 text-center text-gray-300">5</td>
                        <td class="p-4 text-center text-gray-400">--</td>
                        <td class="p-4 text-center"><span class="bg-yellow-900/60 text-yellow-400 px-2.5 py-1 rounded-full text-xs font-bold uppercase">En Curso</span></td>
                    </tr>
                    <tr class="hover:bg-gray-750 transition">
                        <td class="p-4 font-semibold text-white">Redes</td>
                        <td class="p-4 text-center text-gray-300">5</td>
                        <td class="p-4 text-center text-gray-400">--</td>
                        <td class="p-4 text-center"><span class="bg-yellow-900/60 text-yellow-400 px-2.5 py-1 rounded-full text-xs font-bold uppercase">En Curso</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection