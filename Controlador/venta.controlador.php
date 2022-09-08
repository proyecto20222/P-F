<?php

require_once "Modelo/venta/venta.php";

class VentaControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Venta();
    }


    public function Inicio(){
        require_once
        "Vista/inicio/encabezado.php";
        require_once
        "Vista/venta/index.php";

    }

    public function  FormCrear(){
        $titulo="Agregar";
        $p=new Venta();
        if(isset($_GET['codigo'])){
            $p=$this->modelo->Obtener($_GET['codigo']);
            $titulo="Modificar";
        }


        require_once "Vista/inicio/encabezado.php";
        require_once "Vista/venta/form.php";
        
    }

    public function Guardar(){  

        $p=new Venta();
        $p->setCodigo_venta(intval($_POST['Codigo']));
        $p->setCedula_cliente(($_POST['Cedula']));
        $p->setCedula_usuario($_POST['Cedulau']);
        $p->setIva_venta($_POST['Iva']);
        $p->setTotal_venta($_POST['Total']);
        $p->setValor_venta($_POST['Venta']);

        $p->getCodigo_venta() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=venta");

    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["codigo"]);

        header("location:?c=venta");
    }
}

?>