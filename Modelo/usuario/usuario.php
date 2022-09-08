<?php


class Usuario{

    Private $pdo;
    
    private $id;
    private $nombre_usuario;
    private $correo_usuario;
    private $cedula_usuario;
    private $usuario;
    private $contrasena;
    private $rol;


    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }
    public function getId() : ?int{
        return $this->id;
    }

    public function setId(int $id){
        $this->id=$id;
    }

    public function getNombre_usuario() : ?string{
        return $this->nombre_usuario;
    }

    public function setNombre_usuario(string $nombre){
        $this->nombre_usuario=$nombre;
    }

    public function getCorreo_usuario() : ?string{
        return $this->correo_usuario;
    }

    public function setCorreo_usuario(string $correo){
        $this->correo_usuario=$correo;
    }

    public function getCedula_usuario() : ?int{
        return $this->cedula_usuario;
    }

    public function setCedula_usuario(int $cedula){
        $this->cedula_usuario=$cedula;
    }

    public function getUsuario() : ?string{
        return $this->usuario;
    }

    public function setUsuario(string $usuario){
        $this->usuario=$usuario;
    }

    public function getContrasena() : ?string{
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena){
        $this->contrasena=$contrasena;
    }

    public function getRol() :?string{
        return $this->rol;
    }

    public function setRol(string $rol){
        $this->rol=$rol;
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM usuarios;");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getmessage());
        }
    }
   

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM usuarios WHERE id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Usuario();
            $p->setId($r->id);
            $p->setNombre_usuario($r->nombre_usuario);
            $p->setCorreo_usuario($r->correo_usuario);
            $p->setCedula_usuario($r->cedula_usuario);
            $p->setUsuario($r->usuario);
            $p->setContrasena($r->contrasena);
            $p->setRol($r->rol);

            return $p;

        }catch(Exeption $e){
            die($e->getMessage());
        }
    }


    
    public function Insertar(Usuario $p){
        try{
            $consulta="INSERT INTO usuarios(nombre_usuario,correo_usuario,
            cedula_usuario,usuario,contrasena,rol) VALUES (?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                 ->execute(array(
                
                    $p->getNombre_usuario(),
                    $p->getCorreo_usuario(),
                    $p->getCedula_usuario(),
                    $p->getUsuario(),
                    $p->getContrasena(),
                    $p->getRol(),
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Usuario $p){
        try{
            $consulta="UPDATE usuarios SET 
            nombre_usuario=?,
            correo_usuario=?,
            cedula_usuario=?,
            usuario=?,
            contrasena=?,
            rol=?,
            WHERE id=?;
            ";

            $this->pdo->prepare($consulta)
            ->execute(array(
           
               $p->getNombre_usuario(),
               $p->getCantidad_usuario(),
               $p->getCedula_usuario(),
               $p->getUsuario(),
               $p->getContrasena(),
               $p->getRol(),
               $p->getId()
             ));

        }catch(Exception $e){
           die($e->getMessage());
        }
            
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM usuarios WHERE id=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }














}