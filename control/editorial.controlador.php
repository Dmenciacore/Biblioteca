<?php

    require_once "modelo/editorial.php";

class EditorialControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Editorial;
    }

    public function Inicio(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/editoriales/index.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function Iniciar(){
        require_once "vista/inicio/header.php";
        require_once "vista/inicio/editoriales/index.php";
        require_once "vista/inicio/footer.php";
    }

    public function InsertarEditorial(){
        $titulo="Registrar";
        $ed= new Editorial();
        if(isset($_GET['id'])){
            $ed=$this->modelo->ObtenerEditorial($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/editoriales/insertarEdi.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function GuardarEditorial(){
        $ed= new Editorial();
        $ed->setedi_id(intval($_POST['ID']));
        $ed->setedi_nombre($_POST['Nombre']);

        $ed->getEdi_Id() > 0 ?
        $this->modelo->ActualizarEditorial($ed) : 
        $this->modelo->InsertarEditorial($ed);

        echo "<script>
            alert('Registro exitoso');
            window.location= '?c=Editorial&a=Inicio'                    
        </script>";
    }
}