@extends('layouts.app')

@section('titulo', 'Sobre mi')

@section('contenido')
    <h1>Sobre mi</h1>
    <div class="card" style="max-width: 100%; margin-bottom: 30px;">
        <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
            <img src="{{ asset('3135768.png') }}" alt="Foto de perfil" width="150" style="border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <div>
                <h2>Kevin Brayan Colque Chuquimia</h2>
                <p style="margin: 5px 0;"><strong>Carrera:</strong> Ingenieria de Sistemas</p>
                <p style="margin: 5px 0;"><strong>Semestre:</strong> Quinto Semestre</p>
                <p style="margin-top: 10px; font-style: italic; color: #555;">
                    "Al final todo estara bien, si no esta bien es que no hemos llegado al final."
                </p>
            </div>
        </div>
    </div>

    <h2>Habilidades</h2>
    <div class="card" style="max-width: 100%;">
        <ul style="list-style-type: square; margin-left: 20px; line-height: 1.8;">
            <li>Logica de programacion (HTML, un poco de PHP)</li>
            <li>Manejo basico de Bases de Datos (SQL)</li>
            <li>Trabajo en equipo y colaboracion</li>
            <li>Resolucion de problemas complejos</li>
            <li>Adaptabilidad y aprendizaje rapido</li>
        </ul>
    </div>
@endsection