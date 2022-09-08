<?php

require_once "Modelo/basededatos.php";

if(!isset($_GET['c'])){
    require_once "Controlador/inicio.controlador.php";
    $controlador = new iniciocontrolador();
    call_user_func(array($controlador,"inicio"));
}else{
    $controlador = $_GET['c'];
    require_once "Controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador)."controlador";
    $controlador = new $controlador;
    $accion = isset($_GET['a'])? $_GET['a'] : "Inicio";
    call_user_func(array($controlador,$accion));
}






?>