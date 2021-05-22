<?php

    require_once "modelo/autor.php";

class AutorProfControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Autor;
    }

    public function Inicio(){
        require_once "vista/usuario/prof/headerProf.php";
        require_once "vista/usuario/prof/autores/index.php";
        require_once "vista/usuario/prof/footerProf.php";
    }
}