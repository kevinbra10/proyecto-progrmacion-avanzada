@extends('layouts.app')

@section('content')
    <div class="tarjeta">
        <h1>{{ $titulo }}</h1>
        <h2>{{ $estudiante->getNombre() }}</h2>
        
        <p><strong>Matricula:</strong> {{ $estudiante->getMatricula() }}</p>
        <p><strong>Carrera:</strong> {{ $estudiante->getCarrera() }}</p>
        <p><strong>Rol en el Sistema:</strong> {{ $estudiante->getRol() }}</p>
        <p><strong>Promedio General:</strong> {{ $estudiante->calcularPromedio() }}</p>

        <h3 style="margin-top: 30px; color: #1a3c5e;">Materias Inscritas</h3>
        
        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Codigo</th>
                    <th>Creditos</th>
                    <th>Nota Obtenida</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiante->getMaterias() as $materia)
                    <tr>
                        <td>{{ $materia->getNombre() }}</td>
                        <td>{{ $materia->getCodigo() }}</td>
                        <td>{{ $materia->getCreditos() }}</td>
                        <td><strong>{{ $materia->getNotaObtenida() }}</strong></td>
                        <td>
                            <span class="badge-nota {{ $materia->estaAprobada() ? 'aprobado' : 'reprobado' }}">
                                {{ $materia->getEstado() }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 30px;">
            <a href="{{ route('estudiantes.index') }}" class="btn">← Volver al listado</a>
        </div>
    </div>
@endsection