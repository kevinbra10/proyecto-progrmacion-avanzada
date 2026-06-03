@extends('layouts.app')

@section('content')
    <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        <h1 style="color: #1a3c5e;">{{ $titulo }}</h1>
        
        <h2>{{ $estudiante->getNombre() }}</h2>
        <p><strong>Matricula:</strong> {{ $estudiante->getMatricula() }}</p>
        <p><strong>Carrera:</strong> {{ $estudiante->getCarrera() }}</p>
        <p><strong>Rol:</strong> {{ $estudiante->getRol() }}</p>

        <p><strong>Promedio General:</strong> {{ $estudiante->calcularPromedio() }} ({{ $estudiante->getEstado() }})</p>

        <h3 style="margin-top: 30px; color: #1a3c5e;">Materias Inscritas:</h3>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background: #f0f4f8; text-align: left;">
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Materia</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Codigo</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Creditos</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Nota</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiante->getMaterias() as $materia)
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $materia->getNombre() }}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $materia->getCodigo() }}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $materia->getCreditos() }}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd; font-weight: bold;">
                            {{ $materia->getNotaObtenida() }}
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd; font-weight: bold; color: {{ $materia->estaAprobada() ? 'green' : 'red' }}">
                            {{ $materia->getEstado() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top: 30px;">
            <a href="{{ route('estudiantes.index') }}" style="color: #1a3c5e; text-decoration: none; font-weight: bold;">← Volver al listado</a>
        </p>
    </div>
@endsection