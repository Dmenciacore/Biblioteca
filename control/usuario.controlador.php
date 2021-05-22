<?php

require_once "modelo/usuario.php";

class  UsuarioControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Usuario();
    }

    public function Inicio(){
        require_once "vista/header.php";
        require_once "vista/usuario/index.php";
        require_once "vista/footer.php";
    }

    public function modificarClave(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/modificarClave.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function modificarClaveEst(){
        require_once "vista/usuario/estud/headerEst.php";
        require_once "vista/usuario/modificarClave.php";
        require_once "vista/usuario/estud/footerEst.php";
    }

    public function modificarClaveProf(){
        require_once "vista/usuario/prof/headerProf.php";
        require_once "vista/usuario/modificarClave.php";
        require_once "vista/usuario/prof/footerProf.php";
    }

    public function modificarClaveFunc(){
        require_once "vista/usuario/func/headerFunc.php";
        require_once "vista/usuario/modificarClave.php";
        require_once "vista/usuario/func/footerFunc.php";
    }

    public function Iniciar(){
        
        $r = $this->modelo->RectifUsuario($_POST['usu_id'],$_POST['usu_clave']);        
        if (empty($r)) {
            echo "<script>
                    alert('Usuario o Clave incorrectos');
                    window.location= '?c=usuario&a=Login'                    
                </script>";
        }

        $usuario=$this->modelo->ValidarUsuario($_POST['usu_id'],$_POST['usu_clave']);

        $rol=$usuario->getId_Rol();        
        
        if($rol == 2){ //administrador
            session_start();
            $_SESSION['usuario']=$usuario->getUsu_Id();
            //print_r( $usuario);
            //die($_SESSION['usuario']);            
            require_once "vista/usuario/admin/header.php";
            require_once "vista/usuario/admin/index.php";
            require_once "vista/usuario/admin/footer.php";
            session_destroy();
        }else if($rol == 1){//Estudiante
            session_start();
            require_once "vista/usuario/estud/headerEst.php";
            require_once "vista/usuario/estud/index.php";
            $_SESSION['usuario']=$usuario->getUsu_Id();
            //print_r($usuario);
            //die($_SESSION['usuario']);
            print_r($_SESSION);
            require_once "vista/usuario/estud/footerEst.php";
            session_destroy();
        }else if($rol == 3){//Profesor
            session_start();
            $_SESSION['usuario']=$usuario->getUsu_Id();
            require_once "vista/usuario/prof/headerProf.php";
            require_once "vista/usuario/prof/index.php";
            require_once "vista/usuario/prof/footerProf.php";
            session_destroy();
        }else if($rol == 4) {//Funcionario
            session_start();
            $_SESSION['usuario']=$usuario->getUsu_Id();
            require_once "vista/usuario/func/headerFunc.php";
            require_once "vista/usuario/func/index.php";
            require_once "vista/usuario/func/footerFunc.php";
            session_destroy();
        }else {
            session_destroy();
            echo "<script>
                    alert('Usuario o Clave incorrectos');
                    window.location= '?c=usuario&a=Login'                    
                </script>";
        }
    }

    public function Cerrar(){
        //session_destroy();
        header("Location:index.php?cerrado");
    }

    public function Login(){
        require_once "vista/usuario/login.php";
        require_once "vista/inicio/footer.php";
    }

    public function Index(){
    	require_once "vista/header.php";
        require_once "vista/usuario/index.php";
        require_once "vista/footer.php";
    }

    public function RecuperarClave(){
        
        if (empty($_POST['correo'])) {
            echo "<script>
                    alert('Ingrese el correo en el campo');
                    window.location= '?c=usuario&a=Login'                    
                </script>";
        }

        $r = $this->modelo->RectifCorreo($_POST['correo']);
        if (empty($r)) {
            echo "<script>
                    alert('Correo incorrecto');
                    window.location= '?c=usuario&a=Login'                    
                </script>";
        }
        $usuario=$this->modelo->clavePerdida($_POST['correo']);
        $correoDB = $usuario->getUsu_Correo();
        $clave = $usuario->getUsu_Clave();
                
        if (isset($_POST['correo'])) {
            if (!empty($_POST['correo'])) {
                $correo= new Usuario();
                $correo->setUsu_Correo($_POST['correo']);
                $correo->setUsu_Clave($clave);
                
                if (strtolower($correoDB) == strtolower($_POST['correo'])) {
                    require_once "modelo/generarC.php";
                    $clave = new GenerarClave();
                    $claveA = $clave->nuevaClave(11);
                    $Clavenuev= new Usuario();
                    $Clavenuev->setUsu_Correo($_POST['correo']);
                    $Clavenuev->setUsu_Clave($claveA);
                    $this->modelo->modificarClavePerdida($Clavenuev);                    
                    
                    mail($correo,'Cambio de contraseña',"Estimado usuario hemos realizado el cambio de tu contraseña a: $claveA");
                }else {
                    //header("Location: ?c=usuario&a=Login&error=correo_inexistente");
                }
            }else {
                echo "<script>                    
                            alert('Ingrese un dato en el campo');
                        </script>";
                header("Location: ?c=usuario&a=Login&error=campo_vacio");
            }
        }else {
            header("Location: ?c=usuario&a=Login");
        }
        require_once "vista/inicio/header.php";
        require_once "vista/inicio/index.php";
        require_once "vista/inicio/footer.php";
    }

    public function cambiarClave(){
        $usuario=$this->modelo->ValidarClave($_POST['usu_id']);
        $claven = $_POST['clave'];
        $clavenr = $_POST['clave1'];
        $clave=$usuario->getUsu_Clave();
        $id=$usuario->getUsu_Id();

        $Clavec= new Usuario();
        $Clavec->setUsu_Id($_POST['usu_id']);
        $Clavec->setUsu_Clave($_POST['clave']);

        if($claven != $clavenr){
            echo "<script>
                    alert('Datos Incorrectos');
                    window.location= '?c=usuario&a=modificarClave'
                </script>";
        }else if($claven == $clave){
            echo "<script>
                    alert('Las claves no pueden ser iguales');
                    window.location= '?c=usuario&a=modificarClave'
                </script>";
        }else if($claven != $clave){
            $this->modelo->CambiarClave($Clavec);
            echo "<script>
                    alert('Cambio de clave exitoso');
                    window.location= '?c=usuario&a=Login'
                </script>";
        }        
    }    
}