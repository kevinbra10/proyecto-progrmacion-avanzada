<?php
namespace App\Clases;

class Estudiante extends Persona {
    private string $carrera;
    private string $matricula;
    private array $materias;

    public function __construct(string $nombre, string $email, string $carrera, string $matricula) {
    
        parent::__construct($nombre, $email);
        $this->carrera = $carrera;
        $this->matricula = $matricula;
        $this->materias = [];
    }

    public function getRol(): string {
        return "Estudiante";
    }

    public function getCarrera(): string {
        return $this->carrera;
    }

    public function getMatricula(): string {
        return $this->matricula;
    }

    public function getMaterias(): array {
        return $this->materias;
    }

    public function agregarMateria(Materia $materia): void {
        $this->materias[] = $materia;
    }

    public function calcularPromedio(): float {
        if (empty($this->materias)) return 0.0;
        
        $sumaNotas = 0;
        foreach ($this->materias as $materia) {
            $sumaNotas += $materia->getNotaObtenida();
        }
        return round($sumaNotas / count($this->materias), 2);
    }

    public function obtenerMateriaAprobadas(): array {
        return array_filter($this->materias, fn($m) => $m->estaAprobada());
    }

    public function obtenerMateriaReprobadas(): array {
        return array_filter($this->materias, fn($m) => !$m->estaAprobada());
    }
    
    public function getEstado(): string {
        return $this->calcularPromedio() >= 51 ? "Aprobado" : "Reprobado";
    }

    public function generarCarnet(): string {
        return strtoupper(substr($this->carrera, 0, 3)) . "-" . $this->matricula;
    }
}