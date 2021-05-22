<?php

    require_once "modelo/reserva.php";

class ReservaProfControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Reserva;
    }

    public function Inicio(){
        require_once "vista/usuario/prof/headerProf.php";
        require_once "vista/usuario/prof/reserva/index.php";
        require_once "vista/usuario/prof/footerProf.php";
    }
    public function InicioC(){
        require_once "vista/usuario/prof/headerProf.php";
        require_once "vista/usuario/prof/reserva/consultarReserva.php";
        require_once "vista/usuario/prof/footerProf.php";
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
        
        $this->modelo->ActualizarReserva($re);

        header("location:?c=reservaProf&a=InicioC");
    }

    public function GuardarReserva(){

        //Día de la semana
        $dias = array("s&aacute;bado","domingo","lunes","martes","mi&eacute;rcoles","jueves","viernes");
        $num = date("w");
        //Echo "El dia de la fecha es; " . $dias[date("w")];

        if ($dias[date("w")] == "domingo" || $dias[date("w")] == "s&aacute;bado") {

            echo "<script>
            $('#myModal').modal('show'); 
            //alert('No puede realizar prestamos los fines de semana');
                    window.location= '?c=libro&a=InicioP'
                </script>";
        } else {

            $f = DateTime::createFromFormat('d/m/Y', $_POST['re_f_i']);
            $fechai = $f->format('Y/m/d');
            $fs = strtotime('+2 day' , strtotime($fechai));
            $fechafin = date('Y-m-j' , $fs);
            
            //DIVIDE LA FECHA FINAL y RETORNA FECHA SEPARADA POR ITEMS
            $date = date_create($fechafin);
            $d = date_format($date, 'd');
            $m = date_format($date, 'm');
            $y = date_format($date, 'Y');
            $dffin = date("l", mktime(0,0,0,$m,$d,$y));
    
            //echo "Dia de ff: ". $dffin;

            if ($dffin == "Saturday") {

                $f = DateTime::createFromFormat('d/m/Y', $_POST['re_f_i']);
                $fechai = $f->format('Y/m/d');
                $fs = strtotime('+4 day' , strtotime($fechai));
                $Nfechafin = date('Y-m-j' , $fs);

                //echo "Nueva fecha fin es: ".$Nfechafin;

                $re= new Reserva();
                $re->setreserva_id(intval($_POST['ID']));
                $re->setid_libro(intval($_POST['libro_id']));
                $re->setejemplar_codigounico(intval($_POST['codigo']));
                $re->setid_usuario(intval($_POST['Usuario']));
                $re->setid_estado(intval(['Estado']));
                $re->setReserva_Fecha_Inicio($_POST['re_f_i']);
                $re->setReserva_Fecha_Fin($Nfechafin);
                
                $this->modelo->InsertarReserva($re);

                echo "<script>
                    alert('Registro exitoso');
                    window.location= '?c=reservaProf&a=InicioC'                    
                </script>";

            } else if ($dffin == "Sunday") {

                $f = DateTime::createFromFormat('d/m/Y', $_POST['re_f_i']);
                $fechai = $f->format('Y/m/d');
                $fs = strtotime('+3 day' , strtotime($fechai));
                $Nfechafin = date('Y-m-j' , $fs);
    
                //echo "Nueva fecha fin es: ".$Nfechafin;

        $re= new Reserva();
        $re->setreserva_id(intval($_POST['ID']));
        $re->setid_libro(intval($_POST['libro_id']));
        $re->setejemplar_codigounico(intval($_POST['codigo']));
        $re->setid_usuario(intval($_POST['Usuario']));
        $re->setid_estado(intval(['Estado']));
        $re->setReserva_Fecha_Inicio($_POST['re_f_i']);
        $re->setReserva_Fecha_Fin($Nfechafin);
        
        $this->modelo->InsertarReserva($re);

        echo "<script>
                    alert('Registro exitoso');
                    window.location= '?c=reservaProf&a=InicioC'                    
                </script>";

    }
    $re= new Reserva();
        $re->setreserva_id(intval($_POST['ID']));
        $re->setid_libro(intval($_POST['libro_id']));
        $re->setejemplar_codigounico(intval($_POST['codigo']));
        $re->setid_usuario(intval($_POST['Usuario']));
        $re->setid_estado(intval(['Estado']));
        $re->setReserva_Fecha_Inicio($_POST['re_f_i']);
        $re->setReserva_Fecha_Fin($fechafin);
        
        $this->modelo->InsertarReserva($re);

        echo "<script>
                    alert('Registro exitoso');
                    window.location= '?c=reservaProf&a=InicioC'                    
                </script>";
    }
}

    public function EliminarReserva(){
        $this->modelo->EliminarReserva($_GET['id']);
        $this->modelo->ModificarReserva($_GET['ejemcu']);

        header("location:?c=reservaProf&a=InicioC");
    }

    public function ModificarEjemplar(){
        
    }
}