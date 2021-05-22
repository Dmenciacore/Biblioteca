<?php

class Libro{
    private $pdo;

    private $libro_id;
    private $libro_titulo;
    private $libro_codigo;
    private $id_editorial;
    private $id_dewey;
    private $codigo_isbn;
    private $foto;
    //Nuevos
    private $id_autor;
    private $nomb_autor;
    private $apelli_autor;
    private $edi_id;
    private $edi_nombre;
    private $fecha_publicacion;

    public function __CONSTRUCT(){
        $this->pdo = basededatos::Conectar();
    }

    public function getLibro_Id() : ?int{
        return $this->libro_id;
    }

    public function setLibro_Id(int $id){
        $this->libro_id=$id;
    }

    public function getLibro_Titulo() : ?string{
        return $this->libro_titulo;
    }

    public function setLibro_Titulo(string $lt){
        $this->libro_titulo=$lt;
    }

    public function getLibro_Codigo() : ?string{
        return $this->libro_codigo;
    }

    public function setLibro_Codigo(string $lc){
        $this->libro_codigo=$lc;
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

    public function ListarLibro(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libro INNER JOIN editorial ON id_editorial=edi_id INNER JOIN dewey ON id_dewey=dewey_id INNER JOIN autor ON autor_id=id_autor;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarAutor(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM Autor");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarCategoria(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM dewey");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }    

    public function ListarEjemplar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libro INNER JOIN autor ON libro_id=id_autor INNER JOIN editorial ON libro_id=edi_id INNER JOIN ejemplar ON libro_id=ejemp_id");            
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function RectifLibro($libro_codigo){
		try{
			$consulta=$this->pdo->prepare("SELECT * FROM libro WHERE libro_codigo=?;");
			$consulta->execute(array($libro_codigo));
			return $consulta->fetchALL(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libro WHERE libro_id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $lb=new Libro();
            $lb->setLibro_Id($r->libro_id);
            $lb->setLibro_Titulo($r->libro_titulo);
            $lb->setId_Autor($r->autor_id);
            $lb->setLibro_Codigo($r->libro_codigo);
            $lb->setId_Editorial($r->id_editorial);
            $lb->setId_Dewey($r->id_dewey);
            $lb->setCodigo_Isbn($r->codigo_isbn);
            $lb->setFecha_Publicacion($r->fecha_publi);
            $lb->setLibro_Foto($r->libro_foto);

            return $lb;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarEditorial(){
        try{
            $consulta=$this->pdo->prepare("SELECT edi_id,edi_nombre FROM editorial;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function InsertarLibro(Libro $lb){
        try{
            $consulta="INSERT INTO libro(libro_titulo,autor_id,libro_codigo,id_editorial,id_dewey,codigo_isbn,fecha_publi,libro_foto) VALUES (?,?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $lb->getLibro_Titulo(),
                    $lb->getId_Autor(),
                    $lb->getLibro_Codigo(),
                    $lb->getId_Editorial(),
                    $lb->getId_Dewey(),
                    $lb->getCodigo_Isbn(),
                    $lb->getFecha_Publicacion(),
                    $lb->getLibro_Foto()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarLibro(Libro $lb){
        try{
            $consulta="UPDATE libro SET libro_titulo=?,autor_id=?,libro_codigo=?,id_editorial=?,id_dewey=?,codigo_isbn=?,fecha_publi=?,libro_foto=? WHERE libro_id=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $lb->getLibro_Titulo(),
                    $lb->getId_Autor(),
                    $lb->getLibro_Codigo(),
                    $lb->getId_Editorial(),
                    $lb->getId_Dewey(),
                    $lb->getCodigo_Isbn(),
                    $lb->getFecha_Publicacion(),
                    $lb->getLibro_Foto(),
                    $lb->getLibro_Id()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}