<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function sobreMi()
    {
        // Retorna la vista de tu información personal (EF4 Requisito)
        return view('sobre_mi');
    }

    public function materias()
    {
        return view('materias');
    }

    public function contacto()
    {
        return view('contacto');
    }
}