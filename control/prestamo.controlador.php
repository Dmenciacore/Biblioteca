<?php

    require_once "modelo/prestamo.php";

class PrestamoControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Prestamo;
    }

    public function Inicio(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/prestamo/index.php";
        require_once "vista/usuario/admin/footer.php";
    }
    public function InicioC(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/prestamo/consultarPrestamo.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function InsertarPrestamo(){
        $pr= new Prestamo();
        if(isset($_GET['id'])){
            $pr1=$this->modelo->Libro($_GET['id']);
            $pr2=$this->modelo->Estado();
            $pr3=$this->modelo->Ejemplar();

            $titulo="Registrar";
            require_once "vista/usuario/admin/header.php";
            require_once "vista/usuario/admin/prestamo/registrarPrestamo.php";
            require_once "vista/usuario/admin/footer.php";
        }
    }

    public function listarPrestamo(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/prestamo/consultarPrestamo.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function Prestamo(){
        $pr= new Prestamo();
        if(isset($_GET['id'])){
            $pr=$this->modelo->ListarPrestamo($_GET['id']);
            //$re1=$this->modelo->Libro($_GET['id']);
            //$re2=$this->modelo->Estado();
            //$re3=$this->modelo->Ejemplar();

            $titulo="Modificar";
            require_once "vista/usuario/admin/header.php";
            require_once "vista/usuario/admin/prestamo/consultarPrestamo.php";
            require_once "vista/usuario/admin/footer.php";
        }
    }

    /*public function ConsultarPrestamo(){
        $titulo="Registrar";
        $pr= new Prestamo();
        if(isset($_GET['id'])){
            $pr=$this->modelo->ObtenerReserva($_GET['id']);

            $titulo="Editar";
            require_once "vista/header.php";
            require_once "vista/reserva/consultarReserva.php";
            require_once "vista/footer.php";
        }
    }

    public function ModificarReserva(){
        $pr= new Reserva();
        $pr->setreserva_id(intval($_POST['ID']));
        $pr->setid_libro(intval($_POST['libro_id']));
        $pr->setid_usuario(intval($_POST['Usuario']));
        $pr->setid_estado(intval(['Estado']));
        $pr->setReserva_Fecha_Inicio($_POST['re_f_i']);
        $pr->setReserva_Fecha_Fin($_POST['re_f_f']);
        
        $this->modelo->ActualizarReserva($re);

        header("location:?c=reserva&a=InicioC");
    }*/

    public function GuardarPrestamo(){

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

            $f = DateTime::createFromFormat('d/m/Y', $_POST['pr_f_i']);
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

                $f = DateTime::createFromFormat('d/m/Y', $_POST['pr_f_i']);
                $fechai = $f->format('Y/m/d');
                $fs = strtotime('+4 day' , strtotime($fechai));
                $Nfechafin = date('Y-m-j' , $fs);

                //echo "Nueva fecha fin es: ".$Nfechafin;

                $pr= new Prestamo();
                $pr->setPrestamo_id(intval($_POST['ID']));
                $pr->setid_libro(intval($_POST['libro_id']));
                $pr->setejemplar_codigounico(intval($_POST['codigo']));
                $pr->setid_usuario(intval($_POST['Usuario']));
                $pr->setid_estado(intval(['Estado']));
                $pr->setPrestamo_Fecha_Inicio($_POST['pr_f_i']);
                $pr->setPrestamo_Fecha_Fin($Nfechafin);
                
                $this->modelo->InsertarPrestamo($pr);

                echo "<script>                 
                    alert('Préstamo realizado con éxito');
                    window.location= '?c=prestamo&a=InicioC'
                    </script>";

            } else if ($dffin == "Sunday") {

                $f = DateTime::createFromFormat('d/m/Y', $_POST['pr_f_i']);
                $fechai = $f->format('Y/m/d');
                $fs = strtotime('+3 day' , strtotime($fechai));
                $Nfechafin = date('Y-m-j' , $fs);

                //echo "Nueva fecha fin es: ".$Nfechafin;

                $pr= new Prestamo();
                $pr->setPrestamo_id(intval($_POST['ID']));
                $pr->setid_libro(intval($_POST['libro_id']));
                $pr->setejemplar_codigounico(intval($_POST['codigo']));
                $pr->setid_usuario(intval($_POST['Usuario']));
                $pr->setid_estado(intval(['Estado']));
                $pr->setPrestamo_Fecha_Inicio($_POST['pr_f_i']);
                $pr->setPrestamo_Fecha_Fin($Nfechafin);
                
                $this->modelo->InsertarPrestamo($pr);

                echo "<script>                 
                    alert('Préstamo realizado con éxito');
                    window.location= '?c=prestamo&a=InicioC'
                    </script>";
            } 

            $pr= new Prestamo();
            $pr->setPrestamo_id(intval($_POST['ID']));
            $pr->setid_libro(intval($_POST['libro_id']));
            $pr->setejemplar_codigounico(intval($_POST['codigo']));
            $pr->setid_usuario(intval($_POST['Usuario']));
            $pr->setid_estado(intval(['Estado']));
            $pr->setPrestamo_Fecha_Inicio($_POST['pr_f_i']);
            $pr->setPrestamo_Fecha_Fin($fechafin);
            
            $this->modelo->InsertarPrestamo($pr);

            echo "<script>                 
                    alert('Préstamo realizado con éxito');
                    window.location= '?c=prestamo&a=InicioC'
                    </script>";
        }
    }

    public function Devolver(){
        $this->modelo->Devolucion($_GET['id'], $_GET['idr'], $_GET['ejemcu']);

        echo "<script>                 
                    alert('Devolución realizada con éxito');
                    window.location= '?c=prestamo&a=InicioC'
                    </script>";

        header("location:?c=prestamo&a=InicioC");
    }
}