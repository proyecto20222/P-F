<?php

require_once "Modelo/pro/productos.php";

class iniciocontrolador{

    private $modelo;


    public function __CONSTRUCT(){
      $this->modelo=new Producto();
    }


    public function Inicio(){
    
      require_once "Vista/inicio/encabezado.php"; 
      require_once "Vista/principal.php";
      
    }
}
?>