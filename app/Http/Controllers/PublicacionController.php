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

        $estudianteId = session('estudiante_id', 1);

        DB::table('publicaciones')->insert([
            'contenido' => $request->contenido,
            'categoria' => $request->categoria,
            'estudiante_id' => $estudianteId, 
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('foro.index')->with('mensaje', '¡Publicacion compartida con exito al muro!');
    }

    public function eliminar($id)
    {
        DB::table('publicaciones')->where('id', $id)->delete();
        return redirect()->route('foro.index')->with('eliminar', 'La publicacion fue eliminada correctamente.');
    }
}