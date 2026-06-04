<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = DB::table('publicaciones')
            ->leftJoin('estudiantes', 'publicaciones.estudiante_id', '=', 'estudiantes.id')
            ->select('publicaciones.*', 'estudiantes.nombre as estudiante_nombre')
            ->orderBy('publicaciones.created_at', 'desc')
            ->get();

        return view('foro', compact('publicaciones'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'contenido' => 'required',
            'categoria' => 'required'
        ]);

        // Aseguramos que exista al menos una carrera con ID 1 en la base de datos
        $carreraExiste = DB::table('carreras')->where('id', 1)->exists();
        if (!$carreraExiste) {
            DB::table('carreras')->insert([
                'id' => 1,
                'nombre_carrera' => 'Ingenieria de Sistemas',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Verificamos si el estudiante ya existe
        $estudianteExiste = DB::table('estudiantes')->where('id', 1)->exists();

        // Si no existe, lo creamos enviando todos los campos que exige tu phpMyAdmin
        if (!$estudianteExiste) {
            DB::table('estudiantes')->insert([
                'id' => 1,
                'nombre' => 'Kevin Colque',
                'email' => 'kevin@universidad.com',
                'matricula' => '2026-SYS', // Enviamos la matricula obligatoria
                'carrera_id' => 1,          // Lo conectamos con la carrera ID 1
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Guardamos la publicacion
        DB::table('publicaciones')->insert([
            'contenido' => $request->contenido,
            'categoria' => $request->categoria,
            'estudiante_id' => 1, 
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('foro.index');
    }
}