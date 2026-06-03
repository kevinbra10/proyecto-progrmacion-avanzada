@extends('layouts.app')

@section('content')
    <h1 style="color: #1a3c5e;">{{ $titulo }}</h1>
    <p>Lista de alumnos procesados mediante Programación Orientada a Objetos (POO):</p>

    <div style="margin-top: 20px;">
        @foreach($estudiantes as $index => $est)
            <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <h3>{{ $est->getNombre() }}</h3>
                <p><strong>Carrera:</strong> {{ $est->getCarrera() }}</p>
                <a href="{{ route('estudiantes.detalle', $index) }}" style="display: inline-block; background: #1a3c5e; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 13px;">Ver Historial Académico →</a>
            </div>
        @endforeach
    </div>
@endsection