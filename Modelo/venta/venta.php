<?php


class Venta{

    private $pdo;

    private $codigo_venta;
    private $cedula_cliente;
    private $cedula_Usuario;
    private $iva_venta;
    private $total_venta;
    private $valor_venta;
    
    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getCodigo_venta() : ?int{
        return $this->codigo_venta;
    }

    public function setCodigo_venta(int $codigo){
        $this->codigo_venta=$codigo;
    }

    public function getCedula_cliente() : ?int{
        return $this->cedula_cliente;
    }

    public function setCedula_cliente(int $cedula){
        $this->cedula_cliente=$cedula;
    }

    public function getCedula_usuario() : ?int{
        return $this->cedula_usuario;
    }

    public function setCedula_usuario(int $cedulau){
        $this->cedula_Usuario=$cedulau;
    }

    public function getIva_venta() : ?int{
        return $this->iva_venta;
    }

    public function setIva_venta(int $iva){
        $this->iva_venta=$iva;
    }

    public function getTotal_venta() : ?int{
        return $this->total_venta;
    }

    public function setTotal_venta(int $total){
        $this->total_venta=$total;
    }

    public function getValor_venta() : ?int{
        return $this->valor_venta;
    }

    public function setValor_venta(int $venta){
        $this->valor_venta=$venta;
    }

  


    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM ventas;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getmessage());
        }
    }

    public function Obtener($codigo){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM ventas WHERE codigo_venta=?;");
            $consulta->execute(array($codigo));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Venta();
            $p->setCodigo_venta($r->codigo_venta);
            $p->setCedula_cliente($r->cedula_cliente);
            $p->setCedula_usuario($r->cedula_usuario);
            $p->setIva_venta($r->iva_venta);
            $p->setTotal_venta($r->total_venta);
            $p->setValor_venta($r->valor_venta);

            return $p;

        }catch(Exeption $e){
            die($e->getMessage());
        }
    }



    public function Insertar(Venta $p){
        try{
            $consulta="INSERT INTO ventas(cedula_cliente,cedula_usuario,
            iva_venta,total_venta,valor_venta) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                 ->execute(array(
                
                    $p->getCedula_cliente(),
                    $p->getCedula_usuario(),
                    $p->getIva_venta(),
                    $p->getTotal_venta(),
                    $p->getValor_venta(),
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    


    public function Actualizar(Venta $p){
        try{
            $consulta="UPDATE ventas SET 
            cedula_cliente=?,
            cedula_usuario=?,
            iva_venta=?,
            total_venta=?,
            valor_venta=?,
            WHERE codigo_venta=?;
            ";

            $this->pdo->prepare($consulta)
            ->execute(array(
           
               $p->getCedula_cliente(),
               $p->getCedula_usuario(),
               $p->getIva_venta(),
               $p->getTotal_venta(),
               $p->getValor_venta(),
               $p->getCodigo_venta()
             ));

        }catch(Exception $e){
           die($e->getMessage());
        }
            
    }


    public function Eliminar($codigo){
        try{
            $consulta="DELETE FROM ventas WHERE codigo_venta=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($codigo));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    
} 



