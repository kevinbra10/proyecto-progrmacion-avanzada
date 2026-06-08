<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', [AuthController::class, 'mostrarLogin'])->name('login.index');

Route::post('/login-procesar', [AuthController::class, 'procesarLogin'])->name('login.procesar');

// RUTAS DEL FORO CON DB
Route::get('/foro', [PublicacionController::class, 'index'])->name('foro.index');
Route::post('/foro/guardar', [PublicacionController::class, 'guardar'])->name('foro.guardar');
Route::delete('/foro/{id}', [PublicacionController::class, 'eliminar'])->name('foro.eliminar');

// 1. RUTA PARA GUARDAR RESPUESTAS (Limpia y Correcta)
Route::post('/foro/responder/{id}', function (Request $request, $id) {
    $request->validate([
        'contenido' => 'required|string|max:550',
    ]);

    // Guardamos la respuesta en su tabla correspondiente conectada al ID del post original
    DB::table('respuestas')->insert([
        'publicacion_id' => $id,
        'estudiante_id' => session('estudiante_id'),
        'contenido' => $request->contenido,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('mensaje', 'Respuesta añadida al hilo de debate.');
})->name('foro.responder');

// 2. RUTA PARA ELIMINAR UN COMENTARIO/RESPUESTA PROPIO
Route::delete('/foro/respuesta/{id}', function ($id) {
    $respuesta = DB::table('respuestas')->where('id', $id)->first();

    if ($respuesta) {
        if ($respuesta->estudiante_id == session('estudiante_id')) {
            DB::table('respuestas')->where('id', $id)->delete();
            return redirect()->back()->with('eliminar', 'Tu comentario fue eliminado correctamente.');
        }
    }

    return redirect()->back()->with('error', 'No tienes permisos para borrar este comentario.');
})->name('foro.eliminar_respuesta');

Route::get('/mis-publicaciones', [PublicacionController::class, 'misPublicaciones'])->name('foro.mis_posts');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/sobre-mi', [PaginaController::class, 'sobreMi'])->name('sobre-mi');
Route::get('/materias', [PaginaController::class, 'materias'])->name('materias');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [PaginaController::class, 'procesarContacto'])->name('contacto.procesar');
Route::get('/productos', [ProductoController::class, 'productos'])->name('productos');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/{id}', [EstudianteController::class, 'detalle'])->name('estudiantes.detalle');