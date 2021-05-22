<?php

    require_once "modelo/editorial.php";

class EditorialEstControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Editorial;
    }

    public function Inicio(){
        require_once "vista/usuario/estud/headerEst.php";
        require_once "vista/usuario/estud/editoriales/index.php";
        require_once "vista/usuario/estud/footerEst.php";
    }
}