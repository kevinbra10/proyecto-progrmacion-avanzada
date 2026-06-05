<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AuthController;


Route::get('/', [AuthController::class, 'mostrarLogin'])->name('login.index');
Route::post('/login', [AuthController::class, 'procesarLogin'])->name('login.procesar');

Route::get('/foro', [PublicacionController::class, 'index'])->name('foro.index');
Route::post('/foro', [PublicacionController::class, 'guardar'])->name('foro.guardar');


Route::get('/sobre-el-creador', [HomeController::class, 'index'])->name('home');
Route::get('/sobre-mi', [PaginaController::class, 'sobreMi'])->name('sobre-mi');
Route::get('/materias', [PaginaController::class, 'materias'])->name('materias');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [PaginaController::class, 'procesarContacto'])->name('contacto.procesar');
Route::get('/productos', [ProductoController::class, 'productos'])->name('productos');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/{id}', [EstudianteController::class, 'detalle'])->name('estudiantes.detalle');
Route::delete('/foro/{id}', [PublicacionController::class, 'eliminar'])->name('foro.eliminar');
