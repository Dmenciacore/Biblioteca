<?php

    require_once "modelo/ejemplar.php";

class EjemplarControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Ejemplar;
    }

    public function Inicio(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/ejemplares/index.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function Iniciar(){
        require_once "vista/inicio/header.php";
        require_once "vista/inicio/ejemplares/index.php";
        require_once "vista/inicio/footer.php";
    }

    public function InsertarEjemplar(){
        $titulo="Registrar";
        $ej= new Ejemplar();
        if(isset($_GET['id'])){
            $ej=$this->modelo->ObtenerEjemplar($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/ejemplares/insertarEjemplar.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function GuardarEjemplar(){
        $ej= new Ejemplar();
        $ej->setEjemp_Id(intval($_POST['ID']));
        $ej->setEjemp_Codigounico($_POST['Codigo']);
        $ej->setId_Libro(intval($_POST['Libro']));
        $ej->setId_Ingreso(intval($_POST['Ingreso']));
        $ej->setEjemp_Fech_Ingreso($_POST['Fechaingreso']);
        $ej->setEjemp_Fech_Egreso($_POST['Fechaegreso']);
        $ej->setId_Estado(intval($_POST['Estado']));
        $ej->setEjemp_Obser($_POST['Observacion']);

        $ej->getEjemp_Id() > 0 ?
        $this->modelo->ActualizarEjemplar($ej) : 
        $this->modelo->InsertarEjemplar($ej);

        echo "<script>
            alert('Registro exitoso');
            window.location= '?c=Ejemplar&a=Inicio'                    
        </script>";
    }
}