<?php

    require_once "modelo/editorial.php";

class EditorialProfControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Editorial;
    }

    public function Inicio(){
        require_once "vista/usuario/prof/headerProf.php";
        require_once "vista/usuario/prof/editoriales/index.php";
        require_once "vista/usuario/prof/footerProf.php";
    }
}