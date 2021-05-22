<?php

    require_once "modelo/autor.php";

class AutorControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Autor;
    }

    public function Inicio(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/autores/index.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function Iniciar(){
        require_once "vista/inicio/header.php";
        require_once "vista/inicio/autores/index.php";
        require_once "vista/inicio/footer.php";
    }

    public function InsertarAutor(){
        $titulo="Registrar";
        $a= new Autor();
        
        if(isset($_GET['id'])){
            $a=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/autores/insertarAutor.php";
        $_SESSION['usuario']=$usuario;
        require_once "vista/usuario/admin/footer.php";
    }

    public function Guardar(){
        $a= new Autor();
        $a->setid_autor(intval($_POST['ID']));
        $a->setnomb_autor($_POST['Nombre']);
        $a->setapelli_autor($_POST['Apellido']);

        $a->getId_autor() > 0 ?
        $this->modelo->Actualizar($a) : 
        $this->modelo->Insertar($a);

        header("location:?c=autor");
    }
}