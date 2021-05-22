<?php


class Autor{
    private $pdo;

    private $id_autor;
    private $nomb_autor;
    private $apelli_autor;

    public function __CONSTRUCT(){
        $this->pdo = basededatos::Conectar();
    }

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

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM autor;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM autor WHERE id_autor=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $a=new Autor();
            $a->setId_autor($r->id_autor);
            $a->setNomb_Autor($r->nomb_autor);
            $a->setApelli_Autor($r->apelli_autor);

            return $a;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Autor $a){
        try{
            $consulta="INSERT INTO autor(nomb_autor,apelli_autor) VALUES (?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $a->getNomb_Autor(),
                    $a->getApelli_Autor(),
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Autor $a){
        try{
            $consulta="UPDATE autor SET nomb_autor=?,apelli_autor=? WHERE id_autor=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $a->getNomb_Autor(),
                    $a->getApelli_Autor(),
                    $a->getId_Autor()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}