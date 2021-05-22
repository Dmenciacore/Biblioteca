<?php

class InformesControlador{
    private $modelo;

    public function Inicio(){
        require_once "vista/usuario/func/headerFunc.php";
        require_once "vista/usuario/func/informes/index.php";
        require_once "vista/usuario/func/footerFunc.php";
    }

    public function GenerarInforme(){

        $r= $_POST['Informe'];

            if ($r == 'Libros') {

            // incluimos la libreria fpdf
            require_once "assets/Libreria_PDF/fpdf.php";

            // DISEÑO DE LA HOJA
            $pdf=new FPDF('P','mm','Letter'); // Horizontal
            $pdf->SetMargins(20,18); // definimos los margenes
            $pdf->AliasNbPages(); // alista las paginas automaticamente

            $pdf->AddPage(); // agregamos la pagina

            // DATOS DEL TITULO
            $pdf->SetTextColor(0X00, 0X00, 0X00);
            $pdf->Image('assets/logo_b.png',10,6,30);
            $pdf->SetFont("Arial", "b", 9);
            $pdf->Cell(90,5,'DATOS DE LOS LIBROS',0,0);
            
            $pdf->Ln();

            // DATOS DE CONEXION
            $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
            mysqli_select_db($conn,"proyecto");;
            // MOSTRAR DATOS DE TABLA CON ENCABEZADOS
            $pdf->Ln();
            $pdf->Cell(30, 5, "Libro", 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Título"), 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Código"), 1,0, 'C');
            $pdf->Cell(30, 5, "Editorial", 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Código ISBN"), 1,1, 'C');

            $sql = "SELECT libro_id,libro_titulo,libro_codigo,edi_nombre,codigo_isbn from libro INNER JOIN editorial
                    ON libro_id = edi_id;";
            $datos = mysqli_query($conn, $sql) or die("database error:".
            mysqli_error($conn));
            while($row = mysqli_fetch_array($datos))
            {
            $pdf->Cell(30, 5, $row["libro_id"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["libro_titulo"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["libro_codigo"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["edi_nombre"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["codigo_isbn"], 1,1, 'C');
            //HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
            }

            //La ultima linea
            $pdf->Output();
            
        } else if ($r == 'Reservas') {

            // incluimos la libreria fpdf
            require_once "assets/Libreria_PDF/fpdf.php";

            // DISEÑO DE LA HOJA
            $pdf=new FPDF('P','mm','Letter'); // Horizontal
            $pdf->SetMargins(20,18); // definimos los margenes
            $pdf->AliasNbPages(); // alista las paginas automaticamente

            $pdf->AddPage(); // agregamos la pagina

            // DATOS DEL TITULO
            $pdf->SetTextColor(0X00, 0X00, 0X00);
            $pdf->Image('assets/logo_b.png',10,6,30);
            $pdf->SetFont("Arial", "b", 9);
            $pdf->Cell(90,5,'DATOS DE LAS RESERVAS',0,0);
            
            $pdf->Ln();

            // DATOS DE CONEXION
            $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
            mysqli_select_db($conn,"proyecto");;
            // MOSTRAR DATOS DE TABLA CON ENCABEZADOS
            $pdf->Ln();            
            $pdf->Cell(30, 5, utf8_decode("Título"), 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Código Ejemplar"), 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Estado"), 1,0, 'C');
            $pdf->Cell(30, 5, "Fecha Reserva Inicio", 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Fecha Reserva Final"), 1,1, 'C');

            $sql = "SELECT libro_titulo,ejemp_codigounico,estado_nomb,reserva_fecha_inicio,reserva_fecha_fin
                    from reserva
                    INNER JOIN libro ON id_libro = libro_id
                    INNER JOIN estado ON id_estado = estado_id
                    WHERE estado_id = 5;";
            $datos = mysqli_query($conn, $sql) or die("database error:".
            mysqli_error($conn));
            while($row = mysqli_fetch_array($datos))
            {            
            $pdf->Cell(30, 5, $row["libro_titulo"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["ejemp_codigounico"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["estado_nomb"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["reserva_fecha_inicio"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["reserva_fecha_fin"], 1,1, 'C');
            //HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
            }
            
            //La ultima linea
            $pdf->Output();
        } else if ($r == 'Prestamos') {
            // incluimos la libreria fpdf
            require_once "assets/Libreria_PDF/fpdf.php";

            // DISEÑO DE LA HOJA
            $pdf=new FPDF('P','mm','Letter'); // Horizontal
            $pdf->SetMargins(20,18); // definimos los margenes
            $pdf->AliasNbPages(); // alista las paginas automaticamente

            $pdf->AddPage(); // agregamos la pagina

            // DATOS DEL TITULO
            $pdf->SetTextColor(0X00, 0X00, 0X00);
            $pdf->Image('assets/logo_b.png',10,6,30);
            $pdf->SetFont("Arial", "b", 9);
            $pdf->Cell(90,5,'DATOS DE LAS PRESTAMOS',0,0);
            
            $pdf->Ln();

            // DATOS DE CONEXION
            $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
            mysqli_select_db($conn,"proyecto");;
            // MOSTRAR DATOS DE TABLA CON ENCABEZADOS
            $pdf->Ln();
            $pdf->Cell(30, 5, utf8_decode("Libro"), 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Código Ejemplar"), 1,0, 'C');
            $pdf->Cell(30, 5, "Usuario", 1,0, 'C');
            $pdf->Cell(30, 5, "Estado", 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Fecha Préstamo Final"), 1,1, 'C');

            $sql = "SELECT libro_titulo,ejemp_codigounico,id_usuario,estado_nomb,prestamo_fecha_fin
                    from prestamo
                    INNER JOIN libro ON id_libro = libro_id
                    INNER JOIN estado ON id_estado = estado_id
                    WHERE id_estado = 3
                    ;";
            $datos = mysqli_query($conn, $sql) or die("database error:".
            mysqli_error($conn));
            while($row = mysqli_fetch_array($datos))
            {            
            $pdf->Cell(30, 5, $row["libro_titulo"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["ejemp_codigounico"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["id_usuario"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["estado_nomb"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["prestamo_fecha_fin"], 1,1, 'C');
            //HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
            }
            
            //La ultima linea
            $pdf->Output();            
        } else if ($r == 'Devolución') {
            // incluimos la libreria fpdf
            require_once "assets/Libreria_PDF/fpdf.php";

            // DISEÑO DE LA HOJA
            $pdf=new FPDF('P','mm','Letter'); // Horizontal
            $pdf->SetMargins(20,18); // definimos los margenes
            $pdf->AliasNbPages(); // alista las paginas automaticamente

            $pdf->AddPage(); // agregamos la pagina

            // DATOS DEL TITULO
            $pdf->SetTextColor(0X00, 0X00, 0X00);
            $pdf->Image('assets/logo_b.png',10,6,30);
            $pdf->SetFont("Arial", "b", 9);
            $pdf->Cell(90,5,'DATOS DE LAS DEVOLUCIONES',0,0);
            
            $pdf->Ln();

            // DATOS DE CONEXION
            $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
            mysqli_select_db($conn,"proyecto");;
            // MOSTRAR DATOS DE TABLA CON ENCABEZADOS
            $pdf->Ln();
            $pdf->Cell(30, 5, utf8_decode("Libro"), 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Código Ejemplar"), 1,0, 'C');
            $pdf->Cell(30, 5, "Usuario", 1,0, 'C');
            $pdf->Cell(30, 5, "Estado", 1,0, 'C');
            $pdf->Cell(30, 5, utf8_decode("Fecha Préstamo Final"), 1,1, 'C');

            $sql = "SELECT libro_titulo,ejemp_codigounico,id_usuario,estado_nomb,prestamo_fecha_fin
                    from prestamo
                    INNER JOIN libro ON id_libro = libro_id
                    INNER JOIN estado ON id_estado = estado_id
                    WHERE id_estado = 7
                    ;";
            $datos = mysqli_query($conn, $sql) or die("database error:".
            mysqli_error($conn));
            while($row = mysqli_fetch_array($datos))
            {            
            $pdf->Cell(30, 5, $row["libro_titulo"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["ejemp_codigounico"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["id_usuario"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["estado_nomb"], 1,0, 'C');
            $pdf->Cell(30, 5, $row["prestamo_fecha_fin"], 1,1, 'C');
            //HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
            }
            
            //La ultima linea
            $pdf->Output();            
    } else{
            echo "<script>
            alert('Por favor, seleccione una opción');
            window.location= '?c=informes'
            </script>";
        }        

        /*

        // incluimos la libreria fpdf
        require_once "assets/fpdf.php";

        // DISEÑO DE LA HOJA
        $pdf=new FPDF('P','mm','Letter'); // Horizontal
        $pdf->SetMargins(20,18); // definimos los margenes
        $pdf->AliasNbPages(); // alista las paginas automaticamente

        $pdf->AddPage(); // agregamos la pagina

        // DATOS DEL TITULO
        $pdf->SetTextColor(0X00, 0X00, 0X00);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->Cell(90,5,'DATOS DE LAS PERSONAS',1);

        // DATOS DE CONEXION
        $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
        mysqli_select_db($conn,"proyecto");;
        // MOSTRAR DATOS DE TABLA CON ENCABEZADOS
        $pdf->Ln();
        $pdf->Cell(30, 5, "Documento", 1,0, 'C');
        $pdf->Cell(30, 5, "Nombre", 1,0, 'C');
        $pdf->Cell(30, 5, "Apellido", 1,1, 'C');

        $a = $_POST['Informe'];
        $sql = "SELECT * from persona where cedula=$a ;";
        $datos = mysqli_query($conn, $sql) or die("database error:".
        mysqli_error($conn));
        while($row = mysqli_fetch_array($datos))
        {
        $pdf->Cell(30, 5, $row["cedula"], 1,0, 'C');
        $pdf->Cell(30, 5, $row["nombre"], 1,0, 'C');
        $pdf->Cell(30, 5, $row["apellido"], 1,1, 'C');
        //HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
        }

        // DATOS DEL TITULO
        $pdf->SetTextColor(0X00, 0X00, 0X00);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->Cell(90,5,'DATOS DE LOS BENEFICIARIOS',1);

        // DATOS DE CONEXION
        $conn = mysqli_connect("localhost", "root", "") or die(mysql_error());
        mysqli_select_db($conn,"taller2");;
        // MOSTRAR DATOS DE TABLA CON ENCABEZADOS
        $pdf->Ln();
        $pdf->Cell(30, 5, "Documento", 1,0, 'C');
        $pdf->Cell(30, 5, "Nombre", 1,0, 'C');
        $pdf->Cell(30, 5, "Apellido", 1,0, 'C');
        $pdf->Cell(30, 5, "Parentesco", 1,1, 'C');

        $sql = "SELECT doc_bene, nombre_b, apellido_b, nombre_p from beneficiarios inner join parentesco on cod_parent=cod_p where cedula=$a;";
        $datos = mysqli_query($conn, $sql) or die("database error:".
        mysqli_error($conn));
        while($row = mysqli_fetch_array($datos))
        {
        $pdf->Cell(30, 5, $row["doc_bene"], 1,0, 'C');
        $pdf->Cell(30, 5, $row["nombre_b"], 1,0, 'C');
        $pdf->Cell(30, 5, $row["apellido_b"], 1,0, 'C');
        $pdf->Cell(30, 5, $row["nombre_p"], 1,1, 'C');
        //HACE 1,1 ESTE ULTIMO 1 HACE SALTO DE LINEA
        }

        //La ultima linea
        $pdf->Output();

        */

    }
}

?>