<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller 
{
    public function index() 
    {
        // Definimos las variables exactas que tu vista welcome.blade.php necesita
        $nombre = "Kevin Colque"; // <-- Pon tu nombre completo aquí
        $carrera = "Ingeniería de Sistemas"; // <-- Tu carrera 
        $semestre = "5to Semestre"; 
        $año = "2026"; 

        // Enviamos todas las variables juntas a la vista usando compact()
        return view('welcome', compact('nombre', 'carrera', 'semestre', 'año')); 
    }
}