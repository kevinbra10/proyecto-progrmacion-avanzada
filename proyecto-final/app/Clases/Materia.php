<?php

namespace App\Clases;

class Materia {
    private string $nombre;
    private string $codigo;
    private int $creditos;
    private float $notaObtenida;

    public function __construct(string $nombre, string $codigo, int $creditos, float $notaObtenida) {
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->creditos = $creditos;
        $this->notaObtenida = $notaObtenida;
    }

    public function getNombre(): string { return $this->nombre; }
    public function getCodigo(): string { return $this->codigo; }
    public function getCreditos(): int { return $this->creditos; }
    public function getNotaObtenida(): float { return $this->notaObtenida; }

    public function estaAprobada(): bool {
        return $this->notaObtenida >= 51;
    }

    public function getEstado(): string {
        return $this->estaAprobada() ? "Aprobado" : "Reprobado";
    }
}