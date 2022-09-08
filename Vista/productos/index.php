<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/inventario.css">
    <title>P&F Productos</title>
</head>

<body>
<div id="main-container" style="width:800px;height:auto;">

<button style="background-color: rgb(56 91 219);height: 50px;border-radius: 20px;margin-bottom: 15px;width: 90px;">
    <a class="btn" href="?c=producto&a=FormCrear" style="background-color: rgb(56 91 219);color: white;text-decoration: none;font-size: 18px;">Agregar +</a>
</button>


		<table>
			<thead>
				<tr>
					<th>Codigo</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Nit/Proveedor</th>
                    <th>Precio</th>
                    <th>IVA</th>
                    <th>Precio Venta</th>
                    <th>Acciones</th>
				</tr>
			</thead>

            <?php foreach($this->modelo->Listar() as $r):?>
			<tr>
				<td><?=$r->codigo_producto?></td>
                <td><?=$r->nombre_producto?></td>
                <td><?=$r->cantidad_producto?></td>
                <td><?=$r->nitproveedor?></td>
                <td><?=$r->precio_compra?></td>
                <td><?=$r->ivacompra?></td>
                <td><?=$r->precio_venta?></td>
                <td>
                    <a class="btn2" href="?c=producto&a=FormCrear&codigo=<?=$r->codigo_producto?>">Editar</a>
                    <br>
                    <a class="btn3" href="?c=producto&a=Borrar&codigo=<?=$r->codigo_producto?>">Eliminar</a>

                </td>
			</tr>
            <?php endforeach;?>
			
		</table>
	</div>
</body>
</html>