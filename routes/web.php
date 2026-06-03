<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstudianteController;

// RUTA 1 — Inicio (Usando tu HomeController)
Route::get('/', [HomeController::class, 'index'])->name('home');

// RUTA 2 — Sobre mí (Requisito de la Página Personal de la EF4) [cite: 19]
Route::get('/sobre-mi', [PaginaController::class, 'sobreMi'])->name('sobre-mi');

// RUTA 3 — Materias
Route::get('/materias', [PaginaController::class, 'materias'])->name('materias');

// RUTA 4 — Estudiantes (Donde procesas tus clases POO)
Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');

// RUTA 5 — Contacto (Formulario funcional GET) [cite: 15]
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');

// RUTA 6 — Contacto Procesar (Método POST requerido) [cite: 15]
Route::post('/contacto', [PaginaController::class, 'procesarContacto'])->name('contacto.procesar');

// RUTA 7 — Productos
Route::get('/productos', [ProductoController::class, 'productos'])->name('productos');

// Cambia o añade estas líneas en tu archivo de rutas:
Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');

Route::get('/estudiantes/{id}', [EstudianteController::class, 'detalle'])->name('estudiantes.detalle');