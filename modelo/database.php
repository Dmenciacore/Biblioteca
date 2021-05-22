<?php

class basededatos{
    const servidor="localhost";
    const usuariodb = "root";
    const clave="";
    const nombredb="proyecto";

    public static function Conectar(){
        try{
            $conexion = new PDO
            ("mysql:host=".self::servidor.";dbname=".
            self::nombredb.";charset=utf8",self::usuariodb,
            self::clave);

            $conexion->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION); 

            return $conexion;
        }catch(PDOException $e){
            return "Falló".$e->getMessage();
        }
    }
}