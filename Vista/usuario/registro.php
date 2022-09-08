<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/styleregistro.css">
</head>
<body>
    <div id="container">
        <div id="photo">
            <img src="../assets/img/fondo.jpg" alt="fondo">
        </div>
        <div id="formulario2">
            <Img class="avatar" src="../assets/img/My project.jpg" alt="logo de P&F"></Img>
            <h1>Registro</h1>
    
            <form action="login.controlador.php" method="POST">
                <!--Name -->
                <input type="hidden" name="action" value="insert">
                <label for="txtnombre">Nombre:</label>
                <input type="text" name="nombre_usuario" required placeholder="Ingrese Nombre Completo">

                <label for="txtnombre">Usuario:</label>
                <input type="text" name="usuario" required placeholder="Ingrese Usuario">

                <!--Documento de Identidad -->
                <label for="txtcorreo">Documento:</label>
                <input type="number" name="cedula" required placeholder="Ingrese Documento de Identidad">

                <!--Username-->
                <label for="txtcorreo">Correo Electronico:</label>
                <input type="text" required name="correo" placeholder="Ingrese Correco Electronico">

                <!-- Rol -->
                <label for="txtcorreo">Rol:</label>
                <select name="rol" id="">
                    <option value="administrador">Administrador</option>
                    <option value="empleado">Empleado</option>
                    <option value="recepcionista">Recepcionista</option>
                </select>

                <!-- Password-->
                <label for="txtcontrseña">Contraseña:</label>
                <input type="password" name="contrasena" required placeholder="Ingrese Contraseña">





                <div class="btn-form">
                    <button class="btn btn1"><a href="http://localhost:8086/P&F/index.php">Registrarse</a></button>
                    <p>¿Ya tienes cuenta?<a class="link" href="http://localhost:8086/P&F/Controlador/login.controlador.php?action=login"><b>Iniciar Sesion</b></a></p>
                </div>
    
            </form>
        </div>
    </div>
</body>
</html>
