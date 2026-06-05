<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    public function index()
    {
        // Consulta SQL con Joins para traer la informacion guardada de forma fisica
        $estudiantesProcesados = DB::table('estudiante_materia')
            ->join('estudiantes', 'estudiante_materia.estudiante_id', '=', 'estudiantes.id')
            ->join('materias', 'estudiante_materia.materia_id', '=', 'materias.id')
            ->select(
                'estudiantes.nombre as nombre',
                'estudiantes.matricula as matricula',
                'materias.nombre as materia',
                'estudiante_materia.nota as nota'
            )
            ->get()
            ->map(function($item) {
                // Evaluamos el estado usando logica directa sobre el dato real
                $item->estado = $item->nota >= 51 ? 'Aprobado' : 'Reprobado';
                return $item;
            });

        return view('estudiantes', compact('estudiantesProcesados'));
    }
}