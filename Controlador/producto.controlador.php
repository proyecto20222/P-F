<?php

require_once "Modelo/pro/productos.php";

class ProductoControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Producto();
    }


    public function Inicio(){
        require_once
        "Vista/inicio/encabezado.php";
        require_once
        "Vista/productos/index.php";

    }

    public function  FormCrear(){
        $titulo="Agregar";
        $p=new Producto();
        if(isset($_GET['codigo'])){
            $p=$this->modelo->Obtener($_GET['codigo']);
            $titulo="Modificar";
        }


        require_once "Vista/inicio/encabezado.php";
        require_once "Vista/productos/form.php";
        
    }

    public function Guardar(){  

        $p=new Producto();
        $p->setCodigo_producto(intval($_POST['Codigo']));
        $p->setNombre_producto(($_POST['Nombre']));
        $p->setCantidad_producto($_POST['Cantidad']);
        $p->setNitproveedor($_POST['NIT']);
        $p->setPrecio_compra($_POST['Precio']);
        $p->setPrecio_venta($_POST['Precio']);

        $p->getCodigo_producto() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=producto");

    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["codigo"]);

        header("location:?c=producto");
    }
}

?>