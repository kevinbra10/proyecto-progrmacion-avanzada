<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class PaginaController extends Controller
{
    public function inicio()
    {
        return view('inicio', [
            'nombre'   => 'Kevin Brayan Colque Chuquimia',
            'carrera'  => 'Ingenieria de Sistemas',
            'semestre' => 'Quinto semestre',
            'año'      => date('Y'),
        ]);
    }

    public function sobreMi()
    {
        return view('sobre-mi');
    }

    public function materias()
    {
        $materias = Materia::all();

        $materiasConNota = $materias->filter(fn(Materia $m) => !is_null($m->getNota()));

        if ($materiasConNota->count() > 0) {
            $promedio = round($materiasConNota->avg(fn(Materia $m) => $m->getNota()), 2);
        } else {
            $promedio = "No se sabe";
        }

        $aprobadas = $materias->filter(fn(Materia $m) => $m->estaAprobada())->count();

        return view('materias', compact('materias', 'promedio', 'aprobadas'));
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function procesarContacto(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3|max:100',
            'email' => 'required|email',
            'mensaje' => 'required|min:10',
        ]);

        return redirect()->route('contacto')->with('exito', 'Tu mensaje fue enviado correctamente.');
    }
}