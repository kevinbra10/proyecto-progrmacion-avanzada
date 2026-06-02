@extends('layouts.app')

@section('titulo', 'Mis Materias')

@section('contenido')
    <h1>Mis materias</h1>
    
    <table> 
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Materia</th>
                <th>Creditos</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias as $materia)
                @php 
                    $notaVal = $materia->getNota();
                    $notaTexto = is_null($notaVal) ? '--' : $notaVal;
                    
                    $colorTexto = '#555555';
                    if (!is_null($notaVal)) {
                        $colorTexto = $materia->estaAprobada() ? '#12d45d' : '#c71414';
                    }
                @endphp
                <tr style="background: {{ $materia->getColorEstado() }}">
                    <td>{{ $materia->getCodigo() }}</td>
                    <td><strong>{{ $materia->getNombre() }}</strong></td>
                    <td>{{ $materia->getCreditos() }}</td>
                    <td>{{ $notaTexto }}</td>
                    <td style="color: {{ $colorTexto }}; font-weight: bold;">
                        {{ $materia->getEstado() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="font-size: 14px; background-color: #eee; padding: 15px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.05);">
        <strong>Promedio General:</strong> {{ $promedio }} &nbsp;&nbsp;|&nbsp;&nbsp; 
        <strong>Materias Aprobadas:</strong> {{ $aprobadas }}
    </div>
@endsection