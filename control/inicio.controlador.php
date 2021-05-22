<?php

require_once "modelo/autor.php";
require_once "modelo/editorial.php";
require_once "modelo/usuario.php";
require_once "modelo/ejemplar.php";
require_once "modelo/libro.php";
require_once "modelo/reserva.php";

class inicioControlador{
    private $modelo;

    public function __construct(){
        // $this->modelo=new Autor();
        // $this->modelo=new Editorial();
        // $this->modelo=new Usuario();
        // $this->modelo=new Ejemplar();
        $this->modelo=new Libro();
        // $this->modelo=new Reserva();
    }

    public function Inicio(){
   
        $this->modelo->ListarLibro();      

        require_once "vista/inicio/header.php";
        require_once "vista/inicio/index.php";
        require_once "vista/inicio/footer.php";
    }    
}