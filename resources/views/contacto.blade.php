@extends('layouts.app')

@section('content')
    <div class="tarjeta" style="max-width: 600px; margin: 0 auto;">
        <h1>Formulario de Contacto</h1>
        <p>Introduce tus datos para realizar el procesamiento de la informacion mediante metodo POST.</p>

        @if(session('exito'))
            <div class="alerta-exito">
                {{ session('exito') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alerta-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacto.procesar') }}" method="POST">
            @csrf 

            <div class="form-grupo">
                <label class="form-label">Nombre Completo</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Ej. Juan Perez">
            </div>

            <div class="form-grupo">
                <label class="form-label">Correo Electronico</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="juan@correo.com">
            </div>

            <div class="form-grupo">
                <label class="form-label">Mensaje o Motivo</label>
                <textarea name="mensaje" class="form-control" rows="4" placeholder="Escribe tu mensaje aqui...">{{ old('mensaje') }}</textarea>
            </div>

            <button type="submit" class="btn" style="width: 100%;">Enviar Formulario</button>
        </form>
    </div>
@endsection