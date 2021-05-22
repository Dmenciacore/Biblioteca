<?php

class CargaMControlador{

    public function Inicio(){
        require_once "vista/usuario/admin/header.php";
        require_once "vista/usuario/admin/carga/index.php";
        require_once "vista/usuario/admin/footer.php";
    }

    public function GuardarUsuarios(){

        $cnn = mysqli_connect("localhost","root","","proyecto") or die("Error");

        if(isset($_POST['submit']))
        {
            //Aquí es donde seleccionamos nuestro csv
            $fname = $_FILES['archivo']['name'];
            echo 'Cargando nombre del archivo: '.$fname.' <br>';
            $chk_ext = explode(".",$fname);

            if(strtolower(end($chk_ext)) == "csv")
            {
                //si es correcto, entonces damos permisos de lectura para subir
                $filename = $_FILES['archivo']['tmp_name'];
                $file = fopen($filename,"r");

                while(! feof($file))
                {
                    $data = fgetcsv($file);
                    $userData = explode(';',$data[0], 11);
                    //print_r($userData);
                    $consulta = "INSERT INTO usuario(usu_id,usu_nomb,usu_apelli,usu_fechnaci,usu_tipodocu,usu_idestado,usu_correo,usu_tel,usu_clave,id_rol) 
                    VALUES('".$userData[0]."','".$userData[1]."','".$userData[2]."','".$userData[3]."','".$userData[4]."','".$userData[5]."','".$userData[6]."','".$userData[7]."','".$userData[8]."','".$userData[9]."');";
                        
                    $ejecutar = mysqli_query($cnn, $consulta) or die("database error:". mysqli_error($cnn));

                }exit;

                fclose($file);              
            }else{
                //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
                //ver si esta separado por " , "
                    echo "Archivo invalido!";
            }
        }
    }
}