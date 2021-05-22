<?php

require_once "modelo/database.php";

if(!isset($_GET['c'])){
        require_once "control/inicio.controlador.php";        
        $controlador = new inicioControlador();
        call_user_func(array($controlador, "Inicio"));
        
    }else{
        $controlador = $_GET['c'];
        require_once "control/$controlador.controlador.php";
        $controlador = ucwords($controlador)."controlador";
        $controlador = new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
        call_user_func(array($controlador, $accion));
    }