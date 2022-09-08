<?php


class Producto{

    private $pdo;

    private $codigo_produto;
    private $nombre_producto;
    private $cantidad_producto;
    private $nitproveedor;
    private $precio_compra;
    private $ivacompra;
    private $precio_venta;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getCodigo_producto() : ?int{
        return $this->codigo_produto;
    }

    public function setCodigo_producto(int $codigo){
        $this->codigo_produto=$codigo;
    }

    public function getNombre_producto() : ?string{
        return $this->nombre_producto;
    }

    public function setNombre_producto(string $nombre){
        $this->nombre_producto=$nombre;
    }

    public function getCantidad_producto() : ?int{
        return $this->cantidad_producto;
    }

    public function setCantidad_producto(int $cantidad){
        $this->cantidad_producto=$cantidad;
    }

    public function getNitproveedor() : ?int{
        return $this->nitproveedor;
    }

    public function setNitproveedor(int $nit){
        $this->nitproveedor=$nit;
    }

    public function getPrecio_compra() : ?int{
        return $this->precio_compra;
    }

    public function setPrecio_compra(int $precio){
        $this->precio_compra=$precio;
    }

    public function getIvacompra() : ?int{
        return $this->ivacompra;
    }

    public function setIvacompra(int $iva){
        $this->ivacompra=$iva;
    }

    public function getPrecio_venta() :?int{
        return $this->precio_venta;
    }

    public function setPrecio_venta(int $venta){
        $this->precio_venta=$venta;
    }

    public function Cantidad(){
        try{
            $consulta=$this->pdo->prepare("SELECT SUM(cantidad_producto) as Cantidad FROM productos;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getmessage());
        }
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM productos;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getmessage());
        }
    }

    public function Obtener($codigo){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM productos WHERE codigo_producto=?;");
            $consulta->execute(array($codigo));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Producto();
            $p->setCodigo_producto($r->codigo_producto);
            $p->setNombre_producto($r->nombre_producto);
            $p->setCantidad_producto($r->cantidad_producto);
            $p->setNitproveedor($r->nitproveedor);
            $p->setPrecio_compra($r->precio_compra);
            $p->setPrecio_venta($r->precio_compra);

            return $p;

        }catch(Exeption $e){
            die($e->getMessage());
        }
    }



    public function Insertar(Producto $p){
        try{
            $consulta="INSERT INTO productos(nombre_producto,cantidad_producto,
            nitproveedor,precio_compra,ivacompra,precio_venta) VALUES (?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                 ->execute(array(
                
                    $p->getNombre_producto(),
                    $p->getCantidad_producto(),
                    $p->getNitproveedor(),
                    $p->getPrecio_compra(),
                    $p->getIvacompra(),
                    $p->getPrecio_venta(),
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    


    public function Actualizar(Producto $p){
        try{
            $consulta="UPDATE productos SET 
            nombre_producto=?,
            nitproveedor=?,
            precio_compra=?,
            precio_venta=?,
            WHERE codigo_producto=?;
            ";

            $this->pdo->prepare($consulta)
            ->execute(array(
           
               $p->getNombre_producto(),
               $p->getCantidad_producto(),
               $p->getNitproveedor(),
               $p->getPrecio_compra(),
               $p->getIvacompra(),
               $p->getPrecio_venta(),
               $p->getCodigo_producto()
             ));

        }catch(Exception $e){
           die($e->getMessage());
        }
            
    }


    public function Eliminar($codigo){
        try{
            $consulta="DELETE FROM productos WHERE codigo_producto=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($codigo));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    
} 



