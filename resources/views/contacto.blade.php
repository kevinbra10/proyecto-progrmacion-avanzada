@extends('layouts.app')

@section('titulo', 'Contacto')

@section('contenido')
    <h1>Contacto</h1>

    @if (session('exito'))
        <div style="background: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 4px; border: 1px solid #c3e6cb; max-width: 600px;">
            {{ session('exito') }}
        </div>
    @endif

    <div class="card">
        <form action="{{ route('contacto.procesar') }}" method="POST">
            @csrf
            <p>
                <label for="nombre">Nombre completo:</label><br>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre">
                @error('nombre')
                    <span style="color: #c71414; font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </p>
            
            <p>
                <label for="email">Correo electronico:</label><br>
                <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="tu@correo.com">
                @error('email')
                    <span style="color: #c71414; font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </p>
            
            <p>
                <label for="mensaje">Mensaje:</label><br>
                <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje aqui...">{{ old('mensaje') }}</textarea>
                @error('mensaje')
                    <span style="color: #c71414; font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror
            </p>
            
            <button type="submit" class="btn">Enviar Mensaje</button>
        </form>
    </div>
@endsection