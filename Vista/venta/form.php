<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P&F Productos</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="assets/css/clientestyle.css">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
        <div id="container2">
            <div class="container">
                <div id="App" class="row pt-5" style="font-family:sans-serif ; height: auto;margin-left: 200px;">
                    <div class="col-md-4" style="background-color: rgb(243, 239, 232) ; height: 500px; border-radius: 20px;border: 2px;border-radius: 20px;width: 1200px;">
                        <div class="card" style="background-color: #f4f2ed ; height: 500px;height: 400px; margin: 30px;">
                            <div class="card-header" style="background-color: cornflowerblue; ">
                             <h4><?=$titulo?> Venta</h4>  
                            </div>
                            <form id="venta-form" class="card-body" method="POST"
                            action="?c=venta&a=Guardar">

                                <!-- Codigo venta-->

                                <div class="form-group">
                                    <input name="Codigo" type="hidden">
                                </div>

                                <div>
                                    <label for="txtnombre">Cedula Cliente:</label>
                                    <input type="number" required name="Cedula" value="<?=$p->getCedula_cliente()?>" placeholder="Ingrese Cedula del Cliente"
                                        class="form-control">
                                </div>

                                <!-- Cedula usuario-->
                                <div class="form-group">
                                    <label for="txtnombre">Cedula Usuario:</label>
                                    <input type="number" required name="Cedulau" value="<?=$p->getCedula_usuario()?>" placeholder="Ingrese la Cedula del Recepcionista"
                                        class="form-control">
                                </div>

                                <!-- Iva venta-->
                                <div class="form-group">
                                    <label for="txtnumero">Iva:</label>
                                    <input type="number" name="Iva" required value="<?=$p->getIva_venta()?>"
                                        placeholder="Ingrese Iva Aplicado" class="form-control">
                                </div>
                                
                                <!-- PRECIO TOTAL -->
                                <div class="form-group">
                                    <label for="txtnumero">Total Venta:</label>
                                    <input type="number" name="Total" required value="<?=$p->getTotal_venta()?>"
                                        placeholder="Ingrese el Valor Total de la Venta" class="form-control">      
                                </div>

                                <!-- Valor venta -->
                                <div class="form-group">
                                    <label for="txtnumero">Valor Venta:</label>
                                    <input type="number" name="Venta" required value="<?=$p->getValor_venta()?>"
                                        placeholder="Ingrese el Valor de la Venta" class="form-control">       
                                </div>

                                


                                <br>
                                <input type="submit" value="Guardar" class="btn btn-primary btn-block">
                                <input type="reset" value="Borrar" class="btn btn-secondary btn-block">
                                <button class="btn btn-danger btn-block"><a href="http://localhost:8086/P&F/index.php?c=venta" class="texto" style="text-decoration:none;color:white;">Cancelar</a></button>
                            </form>
                        </div>
                    </div>

                </div>

                <div id="product-list" class="col-md-8"></div>

            </div>
            
        </div>
    </div>
    </div>
   
    <script src="assets/js/main.js" charset="utf-8"></script>

</body>

</html>