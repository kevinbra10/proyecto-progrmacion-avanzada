<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function productos()
    {
        $productos = Producto::all();

        $precios = array_map(fn(Producto $p) => $p->getPrecio(), $productos);
        
        $precioPromedio = count($precios) > 0 ? array_sum($precios) / count($precios) : 0;
        $precioPromedio = round($precioPromedio, 2);

        return view('productos', compact('productos', 'precioPromedio'));
    }
}