<?php

require_once "../Modelo/login.php";

class LoginControlador extends Login{

    public function LoginVista(){
        require_once "../Vista/usuario/login.php";

    }
    public function InsertVista(){
        require_once "../Vista/usuario/registro.php";

    }

}

if(isset($_GET['action']) && $_GET['action']=='login'){
    $instanciacontrolador = new LoginControlador();
    $instanciacontrolador->LoginVista();
}

if(isset($_GET['action']) && $_GET['action']=='insert'){
    $instanciacontrolador = new LoginControlador();
    $instanciacontrolador-> InsertVista();
}