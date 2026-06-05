<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('publicaciones')
            ->leftJoin('estudiantes', 'publicaciones.estudiante_id', '=', 'estudiantes.id')
            ->select('publicaciones.*', 'estudiantes.nombre as estudiante_nombre')
            ->orderBy('publicaciones.created_at', 'desc');

    
        if ($request->has('buscar') && $request->buscar != '') {
            $buscar = $request->buscar;
            $query->where(function($q) use ($buscar) {
                $q->where('publicaciones.contenido', 'like', "%{$buscar}%")
                  ->orWhere('publicaciones.categoria', 'like', "%{$buscar}%")
                  ->orWhere('estudiantes.nombre', 'like', "%{$buscar}%");
            });
        }

        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('publicaciones.categoria', $request->categoria);
        }

        $publicaciones = $query->get();

     
        foreach ($publicaciones as $pub) {
            $pub->respuestas = DB::table('respuestas')
                ->join('estudiantes', 'respuestas.estudiante_id', '=', 'estudiantes.id')
                ->where('respuestas.publicacion_id', $pub->id)
                ->select('respuestas.*', 'estudiantes.nombre as estudiante_nombre')
                ->orderBy('respuestas.created_at', 'asc')
                ->get();
        }

        return view('foro', compact('publicaciones'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'contenido' => 'required',
            'categoria' => 'required'
        ]);

        DB::table('publicaciones')->insert([
            'contenido' => $request->contenido,
            'categoria' => $request->categoria,
            'estudiante_id' => session('estudiante_id'), 
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('foro.index')->with('mensaje', '¡Publicación compartida con éxito!');
    }

    public function responder(Request $request, $id)
    {
        $request->validate(['contenido' => 'required']);

        DB::table('respuestas')->insert([
            'contenido' => $request->contenido,
            'publicacion_id' => $id,
            'estudiante_id' => session('estudiante_id'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('mensaje', 'Respuesta añadida al hilo.');
    }

    public function eliminar($id)
    {
        $publicacion = DB::table('publicaciones')->where('id', $id)->first();

       
        if ($publicacion->estudiante_id != session('estudiante_id')) {
            return redirect()->back()->with('eliminar', 'Error: No puedes eliminar una publicación que no es tuya.');
        }

        DB::table('publicaciones')->where('id', $id)->delete();
        return redirect()->back()->with('eliminar', 'La publicación fue eliminada correctamente.');
    }

    public function misPublicaciones()
    {
       
        $publicaciones = DB::table('publicaciones')
            ->where('estudiante_id', session('estudiante_id'))
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($publicaciones as $pub) {
            $pub->respuestas = DB::table('respuestas')
                ->join('estudiantes', 'respuestas.estudiante_id', '=', 'estudiantes.id')
                ->where('respuestas.publicacion_id', $pub->id)
                ->select('respuestas.*', 'estudiantes.nombre as estudiante_nombre')
                ->get();
        }

        return view('mis_posts', compact('publicaciones'));
    }
}