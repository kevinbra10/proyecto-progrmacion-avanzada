@extends('layouts.app')

@section('titulo', 'Sistema')

@section('contenido')
    <h1>mi perfil</h1>
    <div class="card" style="max-width: 100%;">
        <h2>{{ $nombre }}</h2>
        <hr style="margin: 10px 0; border: 0; border-top: 1px solid #ccc;">
        <p style="margin-bottom: 10px;"><strong>Carrera:</strong> {{ $carrera }}</p>
        <p style="margin-bottom: 10px;"><strong>Semestre:</strong> {{ $semestre }}</p>
        <p style="margin-bottom: 15px;"><strong>Gestion:</strong> {{ $año }}</p>
        <p><a class="btn" href="{{ route('materias') }}">Ver Mis Materias</a></p>
    </div>
@endsection