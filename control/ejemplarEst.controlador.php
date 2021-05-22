<?php

    require_once "modelo/ejemplar.php";

class EjemplarEstControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Ejemplar;
    }

    public function Inicio(){
        require_once "vista/usuario/estud/headerEst.php";
        require_once "vista/usuario/estud/ejemplares/index.php";
        require_once "vista/usuario/estud/footerEst.php";        
    }
}