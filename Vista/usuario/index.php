<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/usuariostyle.css">
    <title>P&F Usuarios</title>
</head>
<body>

<div id="main-container" style="width:800px;height:auto;">

<button id="btn-agregar" style="background-color: rgb(56 91 219);height: 50px;border-radius: 20px;margin-bottom: 15px;width: 90px;">
    <a class="btn" href="?c=usuario&a=FormCrear" style="background-color: rgb(56 91 219);color: white;text-decoration: none;font-size: 18px;">Agregar +</a>
</button>

		<table>
			<thead>
				<tr>
					<th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Cedula</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>
				</tr>
			</thead>

            <?php foreach($this->modelo->Listar() as $r):?>
			<tr>
				<td><?=$r->id?></td>
                <td><?=$r->nombre_usuario?></td>
                <td><?=$r->correo_usuario?></td>
                <td><?=$r->cedula_usuario?></td>
                <td><?=$r->usuario?></td>
                <td><?=$r->contrasena?></td>
                <td><?=$r->rol?></td>
                <td>
                    <a class="btn2" href="?c=usuario&a=FormCrear&id=<?=$r->id?>">Editar</a>
                    <br>
                    <a class="btn3" href="?c=usuario&a=Borrar&id=<?=$r->id?>">Eliminar</a>

                </td>
			</tr>
            <?php endforeach;?>
			
		</table>
	</div>
</body>
</html>


    
