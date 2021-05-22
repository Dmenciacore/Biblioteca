<?php

class Ejemplar{
    private $pdo;

    private $ejemp_id;
    private $ejemp_codigounico;
    private $id_libro;
    private $id_ingreso;
    private $ejemp_fech_ingreso;
    private $ejemp_fech_egreso;
    private $id_estado;
    private $ejemp_obser;
    //NUEVAS
    private $id_dewey;
    private $id_autor;
    private $nomb_autor;
    private $apelli_autor;
    private $edi_id;
    private $edi_nombre;
    private $fecha_publicacion;

    public function __CONSTRUCT(){
        $this->pdo = basededatos::Conectar();
    }

    public function getEjemp_Id() : ?int{
        return $this->ejemp_id;
    }

    public function setEjemp_Id(int $id){
        $this->ejemp_id=$id;
    }

    public function getEjemp_Codigounico() : ?int{
        return $this->ejemp_codigounico;
    }

    public function setEjemp_Codigounico(int $cu){
        $this->ejemp_codigounico=$cu;
    }

    public function getId_Libro() : ?int{
        return $this->id_libro;
    }

    public function setId_Libro(int $idlib){
        $this->id_libro=$idlib;
    }

    public function getId_Ingreso() : ?int{
        return $this->id_ingreso;
    }

    public function setId_Ingreso(int $iding){
        $this->id_ingreso=$iding;
    }

    public function getEjemp_Fech_Ingreso() : ? string{
        return $this->ejemp_fech_ingreso;
    }

    public function setEjemp_Fech_Ingreso(string $efi){
        $this->ejemp_fech_ingreso=$efi;
    }

    public function getEjemp_Fech_Egreso() : ?string{
        return $this->ejemp_fech_egreso;
    }

    public function setEjemp_Fech_Egreso(string $efe){
        $this->ejemp_fech_egreso=$efe;
    }

    public function getId_Estado() : ?int{
        return $this->id_estado;
    }

    public function setId_Estado(int $idest){
        $this->id_estado=$idest;
    }

    public function getEjemp_Obser() : ?string{
        return $this->ejemp_obser;
    }

    public function setEjemp_Obser(string $eob){
        $this->ejemp_obser=$eob;
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

    public function ListarEjemplar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM ejemplar INNER JOIN libro ON id_libro=libro_id INNER JOIN estado ON id_estado=estado_id ORDER BY ejemp_fech_ingreso;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarEstado(){
        try{
            $consulta=$this->pdo->prepare("SELECT estado_id,estado_nomb FROM estado;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarLibro(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libro INNER JOIN editorial ON id_editorial=edi_id INNER JOIN dewey ON id_dewey=dewey_id INNER JOIN autor ON autor_id=id_autor ORDER BY ejemp_fech_ingreso;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerEjemplar($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM ejemplar WHERE ejemp_id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $ej=new Ejemplar();
            $ej->setEjemp_Id($r->ejemp_id);
            $ej->setEjemp_Codigounico($r->ejemp_codigounico);   
            $ej->setId_Libro($r->id_libro);
            $ej->setId_Ingreso($r->id_ingreso);
            $ej->setEjemp_Fech_Ingreso($r->ejemp_fech_ingreso);
            $ej->setEjemp_Fech_Egreso($r->ejemp_fech_egreso);
            $ej->setId_Estado($r->id_estado);
            $ej->setEjemp_Obser($r->ejemp_obser);            

            return $ej;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function InsertarEjemplar(Ejemplar $ej){
        try{
            $consulta="INSERT INTO ejemplar(ejemp_codigounico,id_libro,id_ingreso,ejemp_fech_ingreso,ejemp_fech_egreso,id_estado,ejemp_obser) VALUES (?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $ej->getEjemp_Codigounico(),
                    $ej->getId_Libro(),
                    $ej->getId_Ingreso(),
                    $ej->getEjemp_Fech_Ingreso(),
                    $ej->getEjemp_Fech_Egreso(),
                    $ej->getId_Estado(),
                    $ej->getEjemp_Obser()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}