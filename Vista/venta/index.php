<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/inventario.css">
    <title>P&F Ventas</title>
</head>

<body>
<div id="main-container" style="width:800px;height:auto;">

<button style="background-color: rgb(56 91 219);height: 50px;border-radius: 20px;margin-bottom: 15px;width: 90px;">
<a class="btn" href="?c=venta&a=FormCrear" style="background-color: rgb(56 91 219);color: white;text-decoration: none;font-size: 18px;">Agregar +</a>
</button>

		<table>
			<thead>
				<tr>
					<th>Codigo Venta</th>
                    <th>Cedula Cliente</th>
                    <th>Cedula Usuario</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Valor</th>
                    <th>Acciones</th>
				</tr>
			</thead>

            <?php foreach($this->modelo->Listar() as $r):?>
			<tr>
				<td><?=$r->codigo_venta?></td>
                <td><?=$r->cedula_cliente?></td>
                <td><?=$r->cedula_usuario?></td>
                <td><?=$r->iva_venta?></td>
                <td><?=$r->total_venta?></td>
                <td><?=$r->valor_venta?></td>
                <td>
                    <a class="btn2" href="?c=venta&a=FormCrear&codigo=<?=$r->codigo_venta?>">Editar</a>
                    <br>
                    <a class="btn3" href="?c=venta&a=Borrar&codigo=<?=$r->codigo_venta?>">Eliminar</a>

                </td>
			</tr>
            <?php endforeach;?>
			
		</table>
	</div>
</body>
</html>