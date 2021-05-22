<?php

    require_once "modelo/ejemplar.php";

class EjemplarProfControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Ejemplar;
    }

    public function Inicio(){
        require_once "vista/usuario/prof/headerProf.php";
        require_once "vista/usuario/prof/ejemplares/index.php";
        require_once "vista/usuario/prof/footerProf.php";        
    }
}