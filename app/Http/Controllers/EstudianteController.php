<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases\Estudiante;
use App\Clases\Materia;

class EstudianteController extends Controller 
{
    // 1. LISTA GENERAL DE ESTUDIANTES
    public function index() 
    {
        $titulo = "Lista de Estudiantes";
        $estudiantes = $this->obtenerEstudiantes();

        // Llamamos a la vista nativa de Laravel pasándole los datos dinámicos
        return view('estudiantes', compact('estudiantes', 'titulo'));
    }

    // 2. DETALLE DE UN ESTUDIANTE ESPECÍFICO (Se pasa el ID por la URL de Laravel)
    public function detalle($id) 
    {
        $todos = $this->obtenerEstudiantes();
        $id = (int)$id;

        // Validación de existencia de ID al estilo Laravel
        if (!isset($todos[$id])) {
            abort(404, "Estudiante no encontrado");
        }

        $titulo = "Detalle del Estudiante";
        $estudiante = $todos[$id]; 

        // Retornamos la vista de detalle pasándole el objeto estudiante y su ID
        return view('estudiantes_detalle', compact('estudiante', 'titulo', 'id'));
    }

    // 3. TU MATRIZ DE DATOS EN POO
    private function obtenerEstudiantes(): array 
    {
        $e1 = new Estudiante("Mario Bros", "mario@star.com", "Ingenieria de Sistemas", "123");
        $e1->agregarMateria(new Materia("Programacion I", "123", 5, 85));
        $e1->agregarMateria(new Materia("Calculo I", "234", 5, 45));
        $e1->agregarMateria(new Materia("Base de Datos I", "345", 5, 72));
        $e1->agregarMateria(new Materia("Algebra Lineal", "456", 5, 61));

        $e2 = new Estudiante("Jose Jose", "jose@star.com", "Ingenieria Civil", "234");
        $e2->agregarMateria(new Materia("Fisica I", "567", 5, 55));
        $e2->agregarMateria(new Materia("Calculo I", "678", 5, 68));
        $e2->agregarMateria(new Materia("Topografia", "789", 5, 90));
        $e2->agregarMateria(new Materia("Dibujo Tecnico", "890", 5, 49));

        $e3 = new Estudiante("Juanito Perez", "juanito@star.com", "Contaduria Publica", "345");
        $e3->agregarMateria(new Materia("Contabilidad I", "321", 5, 95));
        $e3->agregarMateria(new Materia("Administracion", "432", 5, 88));
        $e3->agregarMateria(new Materia("Microeconomia", "543", 5, 77));
        $e3->agregarMateria(new Materia("Matematica Financiera", "654", 5, 82));

        $e4 = new Estudiante("Ana García", "ana@mail.com", "Ingenieria de Sistemas", "456");
        $e4->agregarMateria(new Materia("Programacion I", "123", 5, 92));
        $e4->agregarMateria(new Materia("Calculo I", "234", 5, 80));

        $e5 = new Estudiante("Lucía Torres", "lucia@mail.com", "Contaduria Publica", "567");
        $e5->agregarMateria(new Materia("Contabilidad I", "321", 5, 40));
        $e5->agregarMateria(new Materia("Administracion", "432", 5, 52));

        return [$e1, $e2, $e3, $e4, $e5];
    }
}