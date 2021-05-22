<?php


class Usuario{
    private $pdo;

    private $usu_id;
    private $usu_nomb;
    private $usu_apelli;
    private $usu_fechnaci;
    private $usu_tipodocu;    
    private $usu_idestado;
    private $usu_correo;
    private $usu_tel;
    private $usu_clave;
    private $id_rol;

    public function __CONSTRUCT(){
        $this->pdo = basededatos::Conectar();
    }

    public function getUsu_Id() : ?int{
        return $this->usu_id;
    }

    public function setUsu_Id(int $id){
        $this->usu_id=$id;
    }

    public function getUsu_Nomb() : ?string{
        return $this->usu_nomb;
    }

    public function setUsu_Nomb(string $nomb){
        $this->usu_nomb=$nomb;
    }

    public function getUsu_Apelli() : ?string{
        return $this->usu_apelli;
    }

    public function setUsu_Apelli(string $apelli){
        $this->usu_apelli=$apelli;
    }

    public function getUsu_Fechnaci() : ?string{
        return $this->usu_fechnaci;
    }

    public function setUsu_Fechnaci(string $fechnaci){
        $this->usu_fechnaci=$fechnaci;
    }

    public function getUsu_Tipodocu() : ?string{
        return $this->usu_tipodocu;
    }

    public function setUsu_Tipodocu(string $tipodocu){
        $this->usu_tipodocu=$tipodocu;
    }

    public function getUsu_Idestado() : ?int{
        return $this->usu_idestado;
    }

    public function setUsu_Idestado(int $idestado){
        $this->usu_idestado=$idestado;
    }

    public function getUsu_Correo() : ?string{
        return $this->usu_correo;
    }

    public function setUsu_Correo(string $correo){
        $this->usu_correo=$correo;
    }

    public function getUsu_Tel() : ?int{
        return $this->usu_tel;
    }

    public function setUsu_Tel(int $tel){
        $this->usu_tel=$tel;
    }

    public function getUsu_Clave() : ?string{
        return $this->usu_clave;
    }

    public function setUsu_Clave(string $clave){
        $this->usu_clave=$clave;
    }

    public function getId_Rol() : ?int{
        return $this->id_rol;
    }

    public function setId_Rol(int $rol){
        $this->id_rol=$rol;
    }

    public function ListarUsuario(){
		try{
			$consulta=$this->pdo->prepare("SELECT * FROM usuario;");
			$consulta->execute();
			return $consulta->fetchALL(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
    }

    public function RectifUsuario($usu_id,$usu_clave){
		try{
			$consulta=$this->pdo->prepare("SELECT * FROM usuario WHERE usu_id=? AND usu_clave=?;");
			$consulta->execute(array($usu_id,$usu_clave));
			return $consulta->fetchALL(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
    }
    
    public function RectifCorreo($usu_correo){
		try{
			$consulta=$this->pdo->prepare("SELECT * FROM usuario WHERE usu_correo=?;");
			$consulta->execute(array($usu_correo));
			return $consulta->fetchALL(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
    }
    
    public function ValidarUsuario($usu_id,$usu_clave){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM usuario WHERE usu_id=? AND usu_clave=?;");
            $consulta->execute(array($usu_id,$usu_clave));
            $r=$consulta->fetch(PDO::FETCH_OBJ);            
                    $usu=new Usuario();
                    $usu->setUsu_Id(intval($r->usu_id));
                    $usu->setUsu_Nomb($r->usu_nomb);
                    $usu->setUsu_Apelli($r->usu_apelli);
                    $usu->setUsu_Fechnaci($r->usu_fechnaci);
                    $usu->setUsu_Tipodocu($r->usu_tipodocu);
                    $usu->setUsu_Idestado($r->usu_idestado);
                    $usu->setUsu_Correo($r->usu_correo);
                    $usu->setUsu_Tel($r->usu_tel);
                    $usu->setUsu_Clave($r->usu_clave);
                    $usu->setId_Rol($r->id_rol);

                    return $usu;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function clavePerdida($correo){
        try{
            $consulta=$this->pdo->prepare("SELECT usu_correo, usu_clave FROM usuario WHERE usu_correo=?;");
            $consulta->execute(array($correo));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $usu=new Usuario();
            $usu->setUsu_Correo($r->usu_correo);
            $usu->setUsu_Clave($r->usu_clave);

            return $usu;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function modificarClavePerdida($clavenuev){
        try{
            $consulta="UPDATE usuario SET usu_clave=? WHERE usu_correo=?;";
        $this->pdo->prepare($consulta)
            ->execute(array(
                $clavenuev->getUsu_Clave(),
                $clavenuev->getUsu_Correo()
            ));
        }catch(Exception $e){
            die($e->getMessage());
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

    public function ValidarClave($usu_id){
        try{
            $consulta=$this->pdo->prepare("SELECT usu_id, usu_clave FROM usuario WHERE usu_id=?;");
            $consulta->execute(array($usu_id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);            
                    $usu=new Usuario();
                    $usu->setUsu_Id(intval($r->usu_id));
                    $usu->setUsu_Clave($r->usu_clave);

                    return $usu;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function CambiarClave(Usuario $Clavec){
        try{
            $consulta="UPDATE usuario SET usu_clave=? WHERE usu_id=?;";
        $this->pdo->prepare($consulta)
            ->execute(array(
                $Clavec->getUsu_Clave(),
                $Clavec->getUsu_Id()
            ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerUsuario($id){
        $consulta=$this->pdo->prepare("SELECT * FROM usuario WHERE usu_id=?");
            $consulta->execute(array($id));
            $c=$consulta->fetch(PDO::FETCH_OBJ);
            if (!empty($c)) {
                return $c;
            }else{
                return false;
            }
    }

}