<?php

class Cliente{

    private $pdo;

    private $id_cliente; 
    private $cedula_cliente;
    private $nombre_cliente;
    private $direccion_cliente;
    private $telefono_cliente;
    private $correo_cliente;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getId_cliente() : ?int{
        return $this->id_cliente;
    }

    public function setId_cliente(int $id){
        $this->id_cliente=$id;
    }
    
    public function getCedula_cliente() : ?int{
        return $this->cedula_cliente;
    }

    public function setCedula_cliente(int $cedula){
        $this->cedula_cliente=$cedula;
    }

    public function getNombre_cliente() : ?string{
        return $this->nombre_cliente;
    }

    public function setNombre_cliente(string $nombre){
        $this->nombre_cliente=$nombre;
    }

    public function getDireccion_cliente() : ?string{
        return $this->direccion_cliente;
    }

    public function setDireccion_cliente(string $direccion){
        $this->direccion_cliente=$direccion;
    }

    public function getTelefono_cliente() : ?int{
        return $this->telefono_cliente;
    }

    public function setTelefono_cliente(int $telefono){
        $this->telefono_cliente=$telefono;
    }

    public function getCorreo_cliente() : ?string{
        return $this->correo_cliente;
    }

    public function setCorreo_cliente(string $correo){
        $this->correo_cliente=$correo;
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM clientes;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getmessage());
        }
    }


    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM clientes WHERE id_cliente=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Cliente();
            $p->setId_cliente($r->id_cliente);
            $p->setNombre_cliente($r->nombre_cliente);
            $p->setCedula_cliente($r->cedula_cliente);
            $p->setDireccion_cliente($r->direccion_cliente);
            $p->setTelefono_cliente($r->telefono_cliente);
            $p->setCorreo_cliente($r->correo_cliente);

            return $p;

        }catch(Exeption $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Cliente $p){
        try{
            $consulta="INSERT INTO clientes(cedula_cliente,nombre_cliente,
            direccion_cliente,telefono_cliente,correo_cliente) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                 ->execute(array(
                
                    $p->getNombre_cliente(),
                    $p->getCedula_cliente(),
                    $p->getDireccion_cliente(),
                    $p->getTelefono_cliente(),
                    $p->getCorreo_cliente(),
                
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function Actualizar(Cliente $p){
        try{
            $consulta="UPDATE clientes SET 
            nombre_cliente=?,
            cedula_cliente=?,
            direccion_cliente=?,
            telefono_cliente=?,
            correo_cliente=?,
            WHERE id_cliente=?;
            ";

            $this->pdo->prepare($consulta)
            ->execute(array(
           
               $p->getNombre_cliente(),
               $p->getCedula_cliente(),
               $p->getDireccion_cliente(),
               $p->getTelefono_cliente(),
               $p->getCorreo_cliente(),
               $p->getId_cliente()
             ));

        }catch(Exception $e){
           die($e->getMessage());
        }
            
    }


    public function Eliminar($id){
        try{
            $consulta="DELETE FROM clientes WHERE id_clientes=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    




   


} 