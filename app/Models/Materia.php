<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['nombre', 'codigo', 'creditos', 'nota_obtenida'];

    public function getNombre(): string { return $this->nombre; }
    public function getCodigo(): string { return $this->codigo; }
    public function getCreditos(): int { return $this->creditos; }
    public function getNota(): ?float { return $this->nota_obtenida; }

    public function estaAprobada(): bool 
    { 
        if (is_null($this->nota_obtenida)) return false;
        return $this->nota_obtenida >= 51; 
    }

    public function getEstado(): string
    {
        if (is_null($this->nota_obtenida)) return 'No se sabe';
        if ($this->nota_obtenida >= 86) return 'Excelente';
        if ($this->nota_obtenida >= 71) return 'Bueno';
        if ($this->nota_obtenida >= 51) return 'Aprobado';
        return 'Reprobado';
    }

    public function getColorEstado(): string
    {
        if (is_null($this->nota_obtenida)) return '#ffffff';

        return match (true) {
            $this->nota_obtenida >= 86 => '#d4edda',
            $this->nota_obtenida >= 71 => '#d1ecf1',
            $this->nota_obtenida >= 51 => '#fff3cd',
            default => '#f8d7da',
        };
    }
}