<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller 
{
    public function index() 
    {
        $nombre = "Kevin Colque"; 
        $carrera = "Ingenieria de Sistemas"; 
        $semestre = "5to Semestre"; 
        $año = "2026"; 

        return view('welcome', compact('nombre', 'carrera', 'semestre', 'año')); 
    }
}