@extends('layouts.app')

@section('content')
    <div style="background: white; border-radius: 10px; padding: 50px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); text-align: center;">
        <h1>{{ $nombre }}</h1>
        <p style="color: #666; margin: 0;">{{ $carrera }} &middot; {{ $semestre }}</p>
        <span style="display: inline-block; background: #1a3c5e; color: white; padding: 8px 20px; border-radius: 20px; font-size: 13px; margin-top: 20px;">
            SIS-500 &mdash; Programación Avanzada &middot; {{ $año }}
        </span>
        <p style="margin-top: 35px; color: #bbb; font-size: 12px;">Construido con Laravel &mdash; Universidad Privada San Francisco de Asís</p>
    </div>
@endsection