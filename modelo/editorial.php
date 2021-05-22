<?php

class Editorial{
    private $pdo;

    private $edi_id;
    private $edi_nombre;

    public function __CONSTRUCT(){
        $this->pdo = basededatos::Conectar();
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

    public function ListarEditorial(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM editorial;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerEditorial($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM editorial WHERE edi_id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $ed=new Editorial();
            $ed->setEdi_Id($r->edi_id);
            $ed->setEdi_Nombre($r->edi_nombre);

            return $ed;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function InsertarEditorial(Editorial $ed){
        try{
            $consulta="INSERT INTO editorial(edi_nombre) VALUES (?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $ed->getEdi_Nombre()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarEditorial(Editorial $ed){
        try{
            $consulta="UPDATE editorial SET edi_nombre=? WHERE edi_id=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $ed->getEdi_Nombre(),
                    $ed->getEdi_Id()
                ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}