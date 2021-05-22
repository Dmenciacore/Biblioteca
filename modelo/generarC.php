<?php

class GenerarClave {

    private $cadena;
    private $longitud;
    private $clave;

    public function __CONSTRUCT(){
        $this->cadena ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $this->clave = '';
    }
    public function nuevaClave($long){
        $long_cdna = strlen($this->cadena);
        $this->longitud = $long;

        for ($x=1; $x <=$this->longitud ; $x++) { 
            $aleatorio = mt_rand(0,$long_cdna-1);
            $this->clave .= substr($this->cadena,$aleatorio,1);
        }
        return $this->clave;
    }
}