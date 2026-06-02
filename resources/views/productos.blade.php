@extends('layouts.app')

@section('titulo', 'Lista de Productos')

@section('contenido')
    <h2>Lista de Productos</h2>
    
    <table>
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Categoria</th>
                <th>Precio (Bs.)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td><strong>{{ $producto->getNombre() }}</strong></td>
                    <td>{{ $producto->getCategoria() }}</td>
                    <td>{{ number_format($producto->getPrecio(), 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="font-size: 14px; background-color: #eee; padding: 15px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.05);">
        <strong>Precio promedio: Bs. {{ number_format($precioPromedio, 2) }}</strong>
    </div>
@endsection