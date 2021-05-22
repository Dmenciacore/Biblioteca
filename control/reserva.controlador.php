<?php

    require_once "modelo/reserva.php";

class ReservaControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Reserva;
    }

    public function Inicio(){
        
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/reserva/index.php";
        //$usuario = $_SESSION['usuario']->getUsu_Id();
        //print_r($usuario);
        require_once "vista/usuario/admin/footer.php";
    }
    public function InicioC(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/prestamo/consultarPrestamo.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function InsertarReserva(){
        $re= new Reserva();
        if(isset($_GET['id'])){
            $re1=$this->modelo->Libro($_GET['id']);
            $re2=$this->modelo->Estado();
            $re3=$this->modelo->Ejemplar();

            $titulo="Registrar";
            require_once "vista/usuario/estud/headerEst.php";
            require_once "vista/usuario/estud/reserva/registrarReserva.php";
            require_once "vista/footer.php";
        }
    }

    public function listarReserva(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/reserva/consultarReserva.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function Reserva(){
        $re= new Reserva();
        if(isset($_GET['id'])){
            $re=$this->modelo->ListarReserva($_GET['id']);

            $titulo="Modificar";
            require_once "vista/usuario/admin/header.php";
            require_once "vista/usuario/admin/reserva/reserva.php";
            require_once "vista/usuario/admin/footer.php";
        }
    }

    public function ConsultarReserva(){
        $titulo="Registrar";
        $re= new Reserva();
        
        if(isset($_GET['id'])){
            $re=$this->modelo->ObtenerReserva($_GET['id']);

            $titulo="Editar";
            require_once "vista/header.php";
            require_once "vista/reserva/consultarReserva.php";
            require_once "vista/footer.php";
        }
    }

    public function ModificarReserva(){
        $re= new Reserva();
        $re->setreserva_id(intval($_POST['ID']));
        $re->setid_libro(intval($_POST['libro_id']));
        $re->setid_usuario(intval($_POST['Usuario']));
        $re->setid_estado(intval(['Estado']));
        $re->setReserva_Fecha_Inicio($_POST['re_f_i']);
        $re->setReserva_Fecha_Fin($_POST['re_f_f']);
        
        $this->modelo->ActualizarReserva($re);

        header("location:?c=reserva&a=InicioC");
    }

    public function GuardarReserva(){
        $re= new Reserva();
        $re->setreserva_id(intval($_POST['ID']));
        $re->setid_libro(intval($_POST['libro_id']));
        $re->setejemplar_codigounico(intval($_POST['codigo']));
        $re->setid_usuario(intval($_POST['Usuario']));
        $re->setid_estado(intval(['Estado']));
        $re->setReserva_Fecha_Inicio($_POST['re_f_i']);
        $re->setReserva_Fecha_Fin($_POST['re_f_f']);
        
        $this->modelo->InsertarReserva($re);

        echo "<script>
            alert('Reserva realizada Exitosamente');
            window.location= '?c=reserva&a=InicioC'                    
        </script>";
    }

    public function Prestar(){
        $re= new Reserva();
        if(isset($_GET['id'])){
            $re=$this->modelo->ListarReserva($_GET['id']);
            $this->modelo->PrestarReserva($re, $_GET['id'], $_GET['ejemcu']);

            $titulo="Modificar";
            //require_once "vista/usuario/estud/headerEst.php";
            //require_once "vista/usuario/estud/reserva/reserva.php";
            //require_once "vista/usuario/estud/footerEst.php";
        }

        echo "<script>
            alert('Préstamo realizado');
            window.location= '?c=reserva&a=InicioC'                    
        </script>";
    }

    public function Devolver(){
        $this->modelo->Devolucion($_GET['id']);
        //$this->modelo->ModificarPrestamo($_GET['ejemcu']);

        header("location:?c=reserva&a=InicioC");
    }
}