<?php

    require_once "modelo/reserva.php";

class ReservaFuncControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Reserva;
    }

    public function Inicio(){
        require_once "vista/usuario/func/headerFunc.php";
        require_once "vista/usuario/func/libro/index.php";
        require_once "vista/usuario/func/footerFunc.php";
    }
    public function InicioC(){
        require_once "vista/usuario/func/headerFunc.php";
        require_once "vista/usuario/func/reserva/consultarReserva.php";
        require_once "vista/usuario/func/footerFunc.php";
    }

    public function InsertarReserva(){
        $re= new Reserva();
        if(isset($_GET['id'])){
            $re1=$this->modelo->Libro($_GET['id']);
            $re2=$this->modelo->Estado();
            $re3=$this->modelo->Ejemplar();

            $titulo="Registrar";
            require_once "vista/usuario/prof/headerProf.php";
            require_once "vista/usuario/prof/reserva/registrarReserva.php";
            require_once "vista/usuario/prof/footerProf.php";
        }
    }

    public function listarReserva(){
        require_once "vista/usuario/prof/headerProf.php";
        require_once "vista/usuario/prof/reserva/consultarReserva.php";
        require_once "vista/usuario/prof/footerProf.php";
    }

    public function Reserva(){
        $re= new Reserva();
        if(isset($_GET['id'])){
            $re=$this->modelo->ListarReserva($_GET['id']);

            $titulo="Modificar";
            require_once "vista/usuario/prof/headerProf.php";
            require_once "vista/usuario/prof/reserva/reserva.php";
            require_once "vista/usuario/prof/footerProf.php";
        }
    }

    public function ConsultarReserva(){
        $titulo="Registrar";
        $re= new Reserva();
        if(isset($_GET['id'])){
            $re=$this->modelo->ObtenerReserva($_GET['id']);

            $titulo="Editar";
            require_once "vista/usuario/prof/headerProf.php";
            require_once "vista/usuario/prof/reserva/consultarReserva.php";
            require_once "vista/usuario/prof/footerProf.php";
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

        header("location:?c=reservaProf&a=InicioC");
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

        header("location:?c=reservaProf&a=InicioC");
    }

    public function EliminarReserva(){
        $this->modelo->EliminarReserva($_GET['id']);
        $this->modelo->ModificarReserva($_GET['ejemcu']);

        header("location:?c=reservaProf&a=InicioC");
    }

    public function ModificarEjemplar(){
        
    }
}