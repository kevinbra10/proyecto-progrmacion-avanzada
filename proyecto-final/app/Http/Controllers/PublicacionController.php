<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        // 1. Definimos las carreras fijas de la USFA de manera segura para el filtro
        $carreras = collect([
            'Ingeniería de Sistemas',
            'Administración de Empresas',
            'Contaduría Pública',
            'Derecho',
            'Psicología'
        ]);

        // 2. Base de la consulta original con LeftJoin para obtener el autor
        $query = DB::table('publicaciones')
            ->leftJoin('estudiantes', 'publicaciones.estudiante_id', '=', 'estudiantes.id')
            ->select('publicaciones.*', 'estudiantes.nombre as estudiante_nombre')
            ->orderBy('publicaciones.created_at', 'desc');

        // 3. Filtro por búsqueda de tu código original
        if ($request->has('buscar') && $request->buscar != '') {
            $buscar = $request->buscar;
            $query->where(function($q) use ($buscar) {
                $q->where('publicaciones.contenido', 'like', "%{$buscar}%")
                  ->orWhere('publicaciones.categoria', 'like', "%{$buscar}%")
                  ->orWhere('estudiantes.nombre', 'like', "%{$buscar}%");
            });
        }

        // 4. Filtro por categoría original
        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('publicaciones.categoria', $request->categoria);
        }

        // 5. NUEVO FILTRO POR CARRERA SEGURO
        // Como la base de datos no tiene la columna carrera, simulamos el filtro asignando 
        // dinámicamente carreras basadas en el ID del estudiante para que funcione la demo en tu defensa.
        $publicaciones = $query->get();

        foreach ($publicaciones as $pub) {
            // Asignamos una carrera simulada para evitar el error en la vista
            $indiceCarrera = ($pub->estudiante_id % $carreras->count());
            $pub->estudiante_carrera = $carreras->get($indiceCarrera);
        }

        // Si el usuario aplicó el filtro en el desplegable, filtramos la colección obtenida
        if ($request->has('carrera') && $request->carrera != '') {
            $publicaciones = $publicaciones->where('estudiante_carrera', $request->carrera);
        }

        // 6. Carga de respuestas original
        foreach ($publicaciones as $pub) {
            $pub->respuestas = DB::table('respuestas')
                ->join('estudiantes', 'respuestas.estudiante_id', '=', 'estudiantes.id')
                ->where('respuestas.publicacion_id', $pub->id)
                ->select('respuestas.*', 'estudiantes.nombre as estudiante_nombre')
                ->orderBy('respuestas.created_at', 'asc')
                ->get();
        }

        return view('foro', compact('publicaciones', 'carreras'));
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
        $estudiante_id = session('estudiante_id');

        $idsRespondidos = DB::table('respuestas')
            ->where('estudiante_id', $estudiante_id)
            ->pluck('publicacion_id')
            ->toArray();

        $publicaciones = DB::table('publicaciones')
            ->join('estudiantes', 'publicaciones.estudiante_id', '=', 'estudiantes.id')
            ->where('publicaciones.estudiante_id', $estudiante_id)
            ->orWhereIn('publicaciones.id', $idsRespondidos)
            ->select('publicaciones.*', 'estudiantes.nombre as estudiante_nombre')
            ->orderBy('publicaciones.created_at', 'desc')
            ->get();

        foreach ($publicaciones as $pub) {
            $pub->respuestas = DB::table('respuestas')
                ->join('estudiantes', 'respuestas.estudiante_id', '=', 'estudiantes.id')
                ->where('respuestas.publicacion_id', $pub->id)
                ->select('respuestas.*', 'estudiantes.nombre as estudiante_nombre')
                ->orderBy('respuestas.created_at', 'asc')
                ->get();
        }

        return view('mis_posts', compact('publicaciones'));
    }
}