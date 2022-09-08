<?php

require_once "Modelo/usuario/usuario.php"; 

class UsuarioControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Usuario();
    }

    public function Inicio(){
        require_once
        "Vista/inicio/encabezado.php";
        require_once
        "Vista/usuario/index.php";
    }


    public function  FormCrear(){
        $titulo="Agregar";
        $p=new usuario();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }


        require_once "Vista/inicio/encabezado.php";
        require_once "Vista/usuario/usuarioform.php";
        
    }


    public function Guardar(){  

        $p=new Usuario();
        $p->setId(intval($_POST['ID']));
        $p->setNombre_usuario(($_POST['Nombre']));
        $p->setCorreo_usuario($_POST['Correo']);
        $p->setCedula_usuario($_POST['Cedula']);
        $p->setUsuario($_POST['Usuario']);
        $p->setContrasena($_POST['Contrasena']);
        $p->setRol($_POST['Rol']);

        $p->getId() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=usuario");

    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);

        header("location:?c=usuario");
    }



}