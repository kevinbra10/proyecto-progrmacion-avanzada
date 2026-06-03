<?php

class HomeController {
    public function index(): void {
        $titulo = "Inicio — Sistema";
        
        require_once 'views/layout/header.php';
        require_once 'views/home.php';
        require_once 'views/layout/footer.php';
    }
}