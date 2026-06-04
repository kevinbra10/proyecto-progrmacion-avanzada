<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function sobreMi()
    {
        return view('sobre_mi');
    }

    public function materias()
    {
        return view('materias');
    }

    public function contacto()
    {
        return view('contacto');
    }


    public function procesarContacto(Request $request)
    {
   
        $request->validate([
            'nombre' => 'required|min:3',
            'email' => 'required|email',
            'mensaje' => 'required|min:10'
        ]);

   
        $nombreProcesado = $request->input('nombre');

        return redirect()->back()->with('exito', 'Formulario procesado correctamente. Bienvenido ' . $nombreProcesado);
    }
}