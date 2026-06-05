<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'mostrarLogin'])->name('login.index');


Route::post('/login-procesar', [AuthController::class, 'procesarLogin'])->name('login.procesar');


Route::get('/foro', [PublicacionController::class, 'index'])->name('foro.index');
Route::post('/foro/guardar', [PublicacionController::class, 'guardar'])->name('foro.guardar');
Route::delete('/foro/{id}', [PublicacionController::class, 'eliminar'])->name('foro.eliminar');
Route::post('/foro/{id}/responder', [PublicacionController::class, 'responder'])->name('foro.responder');


Route::get('/mis-publicaciones', [PublicacionController::class, 'misPublicaciones'])->name('foro.mis_posts');


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/sobre-mi', [PaginaController::class, 'sobreMi'])->name('sobre-mi');
Route::get('/materias', [PaginaController::class, 'materias'])->name('materias');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [PaginaController::class, 'procesarContacto'])->name('contacto.procesar');
Route::get('/productos', [ProductoController::class, 'productos'])->name('productos');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/{id}', [EstudianteController::class, 'detalle'])->name('estudiantes.detalle');