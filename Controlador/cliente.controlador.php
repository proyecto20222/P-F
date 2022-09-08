<?php

require_once "Modelo/cliente/cliente.php";

class ClienteControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Cliente();
    }


    public function Inicio(){
        require_once "Vista/inicio/encabezado.php";
        require_once "Vista/cliente/indexcliente.php";
    }

    public function  FormCrear(){
        $titulo="Agregar";
        $p=new Cliente();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }


        require_once "Vista/inicio/encabezado.php";
        require_once "Vista/cliente/clienteform.php";
        
    }

    public function Guardar(){  

        $p=new Cliente();
        $p->setId_cliente(intval($_POST['ID']));
        $p->setNombre_cliente(($_POST['Nombre']));
        $p->setCedula_cliente($_POST['Cedula']);
        $p->setDireccion_cliente($_POST['Direccion']);
        $p->setTelefono_cliente($_POST['Telefono']);
        $p->setCorreo_cliente($_POST['Correo']);

        $p->getId_cliente() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=cliente");

    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);

        header("location:?c=cliente");
    }


}