<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/stylelogin.css">
</head>
<body>
    <div id="container">
        <div id="photo">
            <img src="../assets/img/fondo.jpg" alt="fondo">
        </div>
        <div id="formulario">
                <img class="avatar" src="../assets/img/My project.jpg" alt="Logo de P&F">
                <h1>Inicio de Sesion</h1>
        
                <form action="login.controlador.php" method="POST">
                    <input type="hidden" name="action" value="login">
                    <label for="txtnombre">Usuario:</label>
                    <input type="text" required placeholder="Ingrese Usuario">
        
                    <label for="txtcontraseña">Contraseña:</label>
                    <input type="password" required placeholder="Ingrese Contraseña">
        
                    <br>
                    <div class="btn-form">
                        <button class="btn btn1"><a href="http://localhost:8086/P&F/index.php">Iniciar Sesion</a></button>
                        <br>
                        <p>¿No tienes cuenta?<a class="link" href="http://localhost:8086/P&F/Controlador/login.controlador.php?action=insert"><b> Registrarse </b></a></p>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>

