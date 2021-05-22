<?php

class Prestamo{
    private $pdo;

    private $prestamo_id;
    private $id_libro;
    private $libro_titulo;
    private $id_usuario;
    private $id_estado;
    private $estado_nomb;
    private $prestamo_fecha_inicio;
    private $prestamo_fecha_fin;

    public function __CONSTRUCT(){
        $this->pdo = basededatos::Conectar();
    }

    public function getPrestamo_Id() : ?int{
        return $this->prestamo_id;
    }

    public function setPrestamo_Id(int $prid){
        $this->prestamo_id=$prid;
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

    public function getPrestamo_Fecha_Inicio() : ?string{
        return $this->prestamo_fecha_inicio;
    }

    public function setPrestamo_Fecha_Inicio(string $prfi){
        $this->prestamo_fecha_inicio=$prfi;
    }

    public function getPrestamo_Fecha_Fin() : ?string{
        return $this->prestamo_fecha_fin;
    }

    public function setPrestamo_Fecha_Fin(string $prff){
        $this->prestamo_fecha_fin=$prff;
    }

    public function ListarPrestamo($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM prestamo WHERE prestamo_id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $pr=new Prestamo();
            $pr->setPrestamo_Id($r->prestamo_id);
            $pr->setId_Libro($r->id_libro);
            $pr->setId_Usuario($r->id_usuario);
            $pr->setId_Estado($r->id_estado);
            $pr->setPrestamo_Fecha_Inicio($r->prestamo_fecha_inicio);
            $pr->setPrestamo_Fecha_Fin($r->prestamo_fecha_fin);

            return $pr;

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

    public function Devolucion($id, $idr, $cu){
        try{
            $this->pdo->beginTransaction();

            $consulta="UPDATE prestamo SET id_estado=7 WHERE prestamo_id=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));

            $consulta="UPDATE reserva SET id_estado=7 WHERE reserva_id=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($idr));

            $consulta="UPDATE ejemplar SET id_estado=1 WHERE ejemp_codigounico=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($cu));

            $this->pdo->commit();
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    public function InsertarPrestamo(Prestamo $pr){
        try{
            $this->pdo->beginTransaction();

            $consulta="UPDATE ejemplar SET id_estado=3 WHERE ejemp_codigounico=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $pr->getEjemplar_Codigounico()
                ));

            $resultado = $this->pdo->inTransaction();
        
            if ($resultado == 1) {

            $consulta="INSERT INTO prestamo(id_libro,ejemp_codigounico,id_usuario,id_estado,prestamo_fecha_inicio,prestamo_fecha_fin) VALUES (?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $pr->getId_Libro(),
                    $pr->getEjemplar_Codigounico(),
                    $pr->getId_Usuario(),                    
                    $pr->getId_Estado(),
                    $pr->getPrestamo_Fecha_Inicio(),
                    $pr->getPrestamo_Fecha_Fin()
                ));

            $ultimo_id = $this->pdo->lastInsertId();
            
            $consulta="UPDATE prestamo SET id_estado=3 WHERE prestamo_id=$ultimo_id;";
            $this->pdo->prepare($consulta)
            ->execute();
            }            
            $this->pdo->commit();
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
}