<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;

// RUTA DE LA PORTADA / LOGIN
Route::get('/', [AuthController::class, 'mostrarLogin'])->name('login.index');

// PROCESA INICIO DE SESIÓN Y REGISTRO (Mantiene el mismo nombre exacto)
Route::post('/login-procesar', [AuthController::class, 'procesarLogin'])->name('login.procesar');

// RUTAS DEL FORO AVANZADO (Unificadas para el buscador Reddit)
Route::get('/foro', [PublicacionController::class, 'index'])->name('foro.index');
Route::post('/foro/guardar', [PublicacionController::class, 'guardar'])->name('foro.guardar');
Route::delete('/foro/{id}', [PublicacionController::class, 'eliminar'])->name('foro.eliminar');
Route::post('/foro/{id}/responder', [PublicacionController::class, 'responder'])->name('foro.responder');

// RUTA DE SECCIÓN EXCLUSIVA (MIS PUBLICACIONES)
Route::get('/mis-publicaciones', [PublicacionController::class, 'misPublicaciones'])->name('foro.mis_posts');

// RUTA DE TU PÁGINA DE PRESENTACIÓN (SOBRE EL CREADOR)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// RUTAS ADICIONALES TOTALMENTE INTACTAS (Módulos originales de tu proyecto)
Route::get('/sobre-mi', [PaginaController::class, 'sobreMi'])->name('sobre-mi');
Route::get('/materias', [PaginaController::class, 'materias'])->name('materias');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [PaginaController::class, 'procesarContacto'])->name('contacto.procesar');
Route::get('/productos', [ProductoController::class, 'productos'])->name('productos');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/{id}', [EstudianteController::class, 'detalle'])->name('estudiantes.detalle');