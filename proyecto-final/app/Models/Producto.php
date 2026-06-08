<?php

namespace App\Models;

class Producto
{
    private string $nombre;
    private string $categoria;
    private float $precio;

    public function __construct(string $nombre, string $categoria, float $precio)
    {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->precio = $precio;
    }

    public function getNombre(): string { return $this->nombre; }
    public function getCategoria(): string { return $this->categoria; }
    public function getPrecio(): float { return $this->precio; }

    public static function all(): array
    {
        return [
            new self('Laptop HP', 'Electronica', 4500),
            new self('Mouse Logi', 'Accesorios', 150.50),
            new self('Teclado Mecanico', 'Accesorios', 350),
            new self('Monitor Gamer 24', 'Electronica', 1200),
            new self('Impresora Epson', 'Oficina', 1800)
        ];
    }
}