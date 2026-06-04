@extends('layouts.app')

@section('content')
    <div class="tarjeta">
        <h1>{{ $titulo }}</h1>
        <p>Lista de alumnos registrados y procesados mediante Programacion Orientada a Objetos (POO):</p>

        <div style="margin-top: 25px;">
            @foreach($estudiantes as $index => $est)
                <div style="border: 1px solid #eef2f5; padding: 20px; border-radius: 6px; margin-bottom: 15px; background: #fafbfc;">
                    <h2>{{ $est->getNombre() }}</h2>
                    <p style="margin-bottom: 10px;"><strong>Carrera:</strong> {{ $est->getCarrera() }}</p>
                    
                    <a href="{{ route('estudiantes.detalle', $index) }}" class="btn">Ver Historial Academico →</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection