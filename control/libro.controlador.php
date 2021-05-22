<?php

    require_once "modelo/libro.php";

class LibroControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Libro;
    }

    public function Inicio(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/libro/index.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function InicioP(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/prestamo/index.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function Iniciar(){
        require_once "vista/inicio/header.php";
        require_once "vista/inicio/libro/index.php";
        require_once "vista/inicio/footer.php";
    }

    public function InsertarLibro(){
        $titulo="Registrar";
        $lb= new Libro();
        if(isset($_GET['id'])){
            $lb=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/libro/insertarLibro.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function GuardarLibro(){
        if($_FILES['Foto']['error']>0){
            echo "Error al cargar";
        }else{
            $permitidos = array("image/jpg", "image/jpeg");
            $limite_kb = 200;

            if(in_array($_FILES['Foto']['type'], $permitidos) && $_FILES['Foto']['size'] <= $limite_kb * 1024){

                $r = move_uploaded_file($_FILES['Foto']['tmp_name'], "assets/images/".$_FILES['Foto']['name']);

                if($r){

                    $lb= new Libro();
                    $lb->setLibro_Id(intval($_POST['ID']));
                    $lb->setLibro_Titulo($_POST['Titulo']);
                    $lb->setId_Autor($_POST['Autor']);
                    $lb->setLibro_Codigo($_POST['Id_Libro']);
                    $lb->setId_Editorial(intval($_POST['Editorial']));
                    $lb->setId_Dewey(intval($_POST['Id_Dewey']));
                    $lb->setCodigo_Isbn($_POST['Codigo_Isbn']);
                    $lb->setFecha_Publicacion($_POST['f_p']);
                    $lb->setLibro_Foto($_FILES['Foto']['name']);
                    $lb->getLibro_Id() > 0 ?
                    $this->modelo->ActualizarLibro($lb) : 
                    $this->modelo->InsertarLibro($lb);

                    echo "<script>
                            alert('Registro exitoso');
                            window.location= '?c=libro&a=Inicio'                    
                        </script>";

                }else{
                    echo "Error";
                    
                }
            }else{
                echo "Archivo no permitido o excede tamaño";
            }
        }
    }
}