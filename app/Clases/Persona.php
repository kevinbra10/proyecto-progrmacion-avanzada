<?php

namespace App\Clases;

abstract class Persona {
    protected string $nombre;
    protected string $email;

    public function __construct(string $nombre, string $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }

    abstract public function getRol(): string;

    public function __toString(): string {
        return "[" . $this->getRol() . "] " . $this->nombre;
    }
}