<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteController {
    
    public function index(): void {
        $titulo = "Lista de Estudiantes";
        $estudiantes = $this->obtenerEstudiantes();

        require_once 'views/layout/header.php';
        require_once 'views/estudiantes/lista.php';
        require_once 'views/layout/footer.php';
    }

    public function detalle(): void {
        $id = (int)($_GET['id'] ?? 0);
        $todos = $this->obtenerEstudiantes();

        // Validación de existencia de ID
        if (!isset($todos[$id])) {
            $titulo = "Estudiante no encontrado";
            require_once 'views/layout/header.php';
            echo "<h2>No existe un estudiante con ese ID.</h2>";
            echo "<a class='btn btn-volver' href='index.php?pagina=estudiantes'>← Volver a la lista</a>";
            require_once 'views/layout/footer.php';
            return;
        }

        $titulo = "Detalle del Estudiante";
        $estudiante = $todos[$id]; 

        require_once 'views/layout/header.php';
        require_once 'views/estudiantes/detalle.php';
        require_once 'views/layout/footer.php';
    }

    private function obtenerEstudiantes(): array {
       
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