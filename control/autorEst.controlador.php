<?php
// echo "<h1>ID DE ESTUDIANTE: ".print_r ($_SESSION['usuario'])."</h1>";

    require_once "modelo/autor.php";

class AutorEstControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Autor;
    }

    public function Inicio(){
        require_once "vista/usuario/estud/headerEst.php";
        require_once "vista/usuario/estud/autores/index.php";
        require_once "vista/usuario/estud/footerEst.php";
    }
}