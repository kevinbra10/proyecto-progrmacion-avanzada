@extends('layouts.app')

@section('content')
    <div style="background: white; border-radius: 10px; padding: 50px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); text-align: center;">
        <h1>{{ $nombre }}</h1>
        <p style="color: #666; margin: 0;">{{ $carrera }} &middot; {{ $semestre }}</p>
        <span style="display: inline-block; background: #1a3c5e; color: white; padding: 8px 20px; border-radius: 20px; font-size: 13px; margin-top: 20px;">
            SIS-500 &mdash; Programación Avanzada &middot; {{ $año }}
        </span>
        <p style="margin-top: 35px; color: #bbb; font-size: 12px;">Construido con Laravel &mdash; Universidad Privada San Francisco de Asís</p>
        <a href="{{ route('foro.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-200 mt-6 text-center">
    Ingresar al Foro Universitario
    <a href="{{ route('foro.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm font-bold shadow">
    Volver al Foro
</a>
</a>
    </div>
@endsection