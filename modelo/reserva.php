<?php

class Reserva{
    private $pdo;

    private $reserva_id;
    private $id_libro;
    private $libro_titulo;
    private $id_usuario;
    private $id_estado;
    private $estado_nomb;
    private $reserva_fecha_inicio;
    //NUEVAS
    private $id_dewey;
    private $id_autor;
    private $nomb_autor;
    private $ejemp_codigounico;
    private $apelli_autor;
    private $edi_id;
    private $edi_nombre;
    private $fecha_publicacion;

    public function __CONSTRUCT(){
        $this->pdo = basededatos::Conectar();
    }

    public function getReserva_Id() : ?int{
        return $this->reserva_id;
    }

    public function setReserva_Id(int $reid){
        $this->reserva_id=$reid;
    }

    public function getId_Libro() : ?int{
        return $this->id_libro;
    }

    public function setId_Libro(int $idlib){
        $this->id_libro=$idlib;
    }

    public function getLibro_Titulo() : ?string{
        return $this->libro_titulo;
    }

    public function setLibro_Titulo(string $libtit){
        $this->libro_titulo=$libtit;
    }

    public function getId_Usuario() : ?int{
        return $this->id_usuario;
    }

    public function setId_Usuario(int $idusu){
        $this->id_usuario=$idusu;
    }

    public function getEjemplar_Codigounico() : ?int{
        return $this->ejemp_codigounico;
    }

    public function setEjemplar_Codigounico(int $ejemcodu){
        $this->ejemp_codigounico=$ejemcodu;
    }

    public function getId_Estado() : ?int{
        return $this->id_estado;
    }

    public function setId_Estado(int $idest){
        $this->id_estado=$idest;
    }

    public function getEstado_Nomb() : ?string{
        return $this->estado_nomb;
    }

    public function setEstado_Nomb(string $estnomb){
        $this->estado_nomb=$estnomb;
    }

    public function getReserva_Fecha_Inicio() : ?string{
        return $this->reserva_fecha_inicio;
    }

    public function setReserva_Fecha_Inicio(string $refi){
        $this->reserva_fecha_inicio=$refi;
    }

    public function getReserva_Fecha_Fin() : ?string{
        return $this->reserva_fecha_fin;
    }

    public function setReserva_Fecha_Fin(string $reff){
        $this->reserva_fecha_fin=$reff;
    }
        /////////NUEVOS/////////////
        public function getId_Autor() : ?int{
            return $this->id_autor;
        }
    
        public function setId_Autor(int $id){
            $this->id_autor=$id;
        }
    
        public function getNomb_Autor() : ?string{
            return $this->nomb_autor;
        }
    
        public function setNomb_Autor(string $nomb){
            $this->nomb_autor=$nomb;
        }
    
        public function getApelli_Autor() : ?string{
            return $this->apelli_autor;
        }
    
        public function setApelli_Autor(string $apelli){
            $this->apelli_autor=$apelli;
        }
        public function getEdi_Id() : ?int{
            return $this->edi_id;
        }
    
        public function setEdi_Id(int $id){
            $this->edi_id=$id;
        }
    
        public function getEdi_Nombre() : ?string{
            return $this->edi_nombre;
        }
    
        public function setEdi_Nombre(string $nomb){
            $this->edi_nombre=$nomb;
        }
    
        public function getFecha_Publicacion() : ?string{
            return $this->fecha_publi;
        }
    
        public function setFecha_Publicacion(string $fpub){
            $this->fecha_publi=$fpub;
        }
    
        public function getId_Editorial() : ?int{
            return $this->id_editorial;
        }
    
        public function setId_Editorial(int $idedi){
            $this->id_editorial=$idedi;
        }
    
        public function getId_Dewey() : ?int{
            return $this->id_dewey;
        }
    
        public function setId_Dewey(int $iddewey){
            $this->id_dewey=$iddewey;
        }
    
        public function getNombre_Dewey() : ?string{
            return $this->nombre_dewey;
        }
    
        public function setNombre_Dewey(string $deweyn){
            $this->nombre_dewey=$deweyn;
        }
    
        public function getDesc_Dewey() : ?string{
            return $this->desc_dewey;
        }
    
        public function setDesc_Dewey(string $descdewey){
            $this->desc_dewey=$descdewey;
        }
    
        public function getCodigo_Isbn() : ? string{
            return $this->codigo_isbn;
        }
    
        public function setCodigo_Isbn(string $codisbn){
            $this->codigo_isbn=$codisbn;
        }
    
        public function getLibro_Foto(){
            return $this->foto;
        }
    
        public function setLibro_Foto($ft){
            $this->foto=$ft;
        }

    public function Libro($id){
        try{
            $consulta=$this->pdo->prepare("SELECT libro_id,libro_titulo FROM libro WHERE libro_id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            
            return $r;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Estado(){
        try{
            $consulta=$this->pdo->prepare("SELECT estado_id,estado_nomb FROM ejemplar INNER JOIN estado ON id_estado=estado_id WHERE id_estado=1;");
            $consulta->execute(array());
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            return $r;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Ejemplar(){
        try{
            $consulta=$this->pdo->prepare("SELECT ejemp_codigounico FROM ejemplar WHERE id_estado=1;");
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            return $r;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerPrestamo(){
        try{
            $this->pdo->beginTransaction();
            
            $consulta=$this->pdo->prepare("SELECT * FROM prestamo INNER JOIN estado ON id_estado=estado_id INNER JOIN libro ON id_libro=libro_id WHERE id_estado=3;");
            $consulta->execute();
            
            return $consulta->fetchAll(PDO::FETCH_OBJ);

            $this->pdo->commit();
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    public function ObtenerReserva(){
        try{
            $this->pdo->beginTransaction();

            $consulta=$this->pdo->prepare("SELECT * FROM reserva INNER JOIN estado ON id_estado=estado_id INNER JOIN libro ON id_libro=libro_id where id_estado=5;");
            $consulta->execute();
            
            
            return $consulta->fetchAll(PDO::FETCH_OBJ);

            $this->pdo->commit();
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    public function ListarLibro(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libro INNER JOIN editorial ON id_editorial=edi_id INNER JOIN dewey ON id_dewey=dewey_id INNER JOIN autor ON autor_id=id_autor;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarReserva($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM reserva INNER JOIN estado ON id_estado=estado_id INNER JOIN libro ON id_libro=libro_id WHERE reserva_id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $rv=new Reserva();
            $rv->setReserva_Id($r->reserva_id);
            $rv->setId_Libro($r->id_libro);
            $rv->setLibro_Titulo($r->libro_titulo);
            $rv->setEjemplar_Codigounico($r->ejemp_codigounico);
            $rv->setId_Usuario($r->id_usuario);
            $rv->setId_Estado($r->id_estado);
            $rv->setEstado_Nomb($r->estado_nomb);
            $rv->setReserva_Fecha_Inicio($r->reserva_fecha_inicio);
            $rv->setReserva_Fecha_Fin($r->reserva_fecha_fin);

            return $rv;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function InsertarReserva(Reserva $res){
        try{
            $this->pdo->beginTransaction();

            $consulta="UPDATE ejemplar SET id_estado=5 WHERE ejemp_codigounico=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $res->getEjemplar_Codigounico()
                ));

            $resultado = $this->pdo->inTransaction();
            
            if ($resultado == 1) {

                $consulta="INSERT INTO reserva(id_libro,ejemp_codigounico,id_usuario,id_estado,reserva_fecha_inicio,reserva_fecha_fin) VALUES (?,?,?,?,?,?);";
                $this->pdo->prepare($consulta)
                ->execute(array(
                    $res->getId_Libro(),
                    $res->getEjemplar_Codigounico(),
                    $res->getId_Usuario(),                    
                    $res->getId_Estado(),
                    $res->getReserva_Fecha_Inicio(),
                    $res->getReserva_Fecha_Fin()
                ));

                $ultimo_id = $this->pdo->lastInsertId();
                
                $consulta="UPDATE reserva SET id_estado=5 WHERE reserva_id=$ultimo_id;";
                $this->pdo->prepare($consulta)
                ->execute();
            }
            $this->pdo->commit();
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    public function ActualizarReserva(Reserva $res){
        try{
            $consulta="UPDATE reserva SET reserva_fecha_inicio=? WHERE reserva_id=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $res->getReserva_Fecha_Inicio(),
                    $res->getReserva_Id()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function PrestarReserva($re, $id, $cu){
        try{
            $this->pdo->beginTransaction();

                $consulta="UPDATE ejemplar SET id_estado=3 WHERE ejemp_codigounico=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array($cu));

            $result=$this->pdo->inTransaction();

            if ($result == 1) {
                
                $consulta="INSERT INTO prestamo(reserva_id,id_libro,ejemp_codigounico,id_usuario,id_estado,prestamo_fecha_inicio,prestamo_fecha_fin) VALUES (?,?,?,?,?,?,?);";
                $this->pdo->prepare($consulta)
                ->execute(array(
                    $re->getReserva_Id(),
                    $re->getId_Libro(),                    
                    $re->getEjemplar_Codigounico(),
                    $re->getId_Usuario(),                    
                    $re->getId_Estado(),
                    $re->getReserva_Fecha_Inicio(),
                    $re->getReserva_Fecha_Fin()
                ));
                
                $ultimo_id = $this->pdo->lastInsertId();
                
                $consulta="UPDATE reserva SET id_estado=3 WHERE reserva_id=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array($id));

                $consulta="UPDATE prestamo SET id_estado=3 WHERE prestamo_id=$ultimo_id;";
                $this->pdo->prepare($consulta)
                        ->execute(array($id));
            }
            $this->pdo->commit();
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    public function EliminarReserva($id, $cu){
        try{

            $this->pdo->beginTransaction();

                $consulta="UPDATE ejemplar SET id_estado=1 WHERE ejemp_codigounico=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array($cu));

                $consulta="UPDATE reserva SET id_estado=6 WHERE reserva_id=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array($id));

            $this->pdo->commit();
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    public function Devolucion($id){
        try{
            $consulta="UPDATE reserva SET id_estado=1 WHERE reserva_id=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ModificarPrestamo($ecu){
        try{
            $consulta="UPDATE ejemplar SET id_estado=3 WHERE ejemp_codigounico=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $ecu->getEjemplar_Codigounico()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}