<?php
    require 'config.php';

    $grand_total=0;
    $itemsTotales = '';
    $items = array();

    $sql = "SELECT CONCAT(nombre_producto, '(',cantidad,')') AS cantidadItem, precio_total FROM carro_compra";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        $grand_total += $row['precio_total'];
        $items[]=$row['cantidadItem'];
    } 
    $itemsTotales = implode(", ", $items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSAPP | VERIFICAR COMPRA</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!--Font awesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
        <a class="navbar-brand" href="./compras.php"><i class="fa fa-shopping-bag"></i>&nbsp; Nombre Tienda</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="./compras.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./compra.php">Compra</a>
                </li>
                <!--AQUI DEFINO EL CARRITO OJO EL ID=itemCarro-->
                <li class="nav-item">
                    <a class="nav-link" href="./carro_compra.php"><i class="fa fa-shopping-cart"> <span  id="itemCarro" class="badge badge-danger"></span></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4">
                <h4 class="text-center text-info">Completar datos para la compra</h4>
                <div class="jumbotron p-3 mb-2 text-center" id="orden">
                    <h6 class="lead"><strong> Producto(s):</strong>&nbsp;<?= $itemsTotales; ?></h6>
                    <h6 clasee="lead"><strong>Cargo delivery: </strong>Gratuito</h6>
                    <h5><strong>Total a pagar: </strong>&nbsp;<?= number_format($grand_total,2) ?></h5>
                </div>
                <form action="" method="post" id="ordenCompra">
                    <input type="hidden" name="productos" value="<?= $itemsTotales ?>">
                    <input type="hidden" name="gran_total" value="<?= $grand_total ?>">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="cedula" class="form-control" placeholder="Ingrese su cédula" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="telefono" class="form-control" placeholder="Ingrese su teléfono" required>
                    </div>
                    <div class="form-group">
                        <input type="mail" name="mail" class="form-control" placeholder="Ingrese su correo" required>
                    </div>
                    <div class="form-group">
                        <textarea name="direccion" class="form-control" rows="3" cols="10" placeholder="Ingrese su dirección"></textarea>
                    </div>
                    <h6 class="text-center lead">Seleccione su método de pago</h6>
                    <div class="form-group">
                        <select name="metodoPago" class="form-control">
                            <option value="" selected disabled>Seleccione método de Pago</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="transferencia">Transferencia</option>
                            <option value="tarjeta">Tarjeta Débito/Crédito</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Completar Orden" class="btn btn-danger btn-block">
                    </div >
                </form>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        
        $("#ordenCompra").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: 'accion.php',
                method: 'post',
                data: $('form').serialize()+"&action=orden",
                success: function(response)
                {
                    $("#orden").html(response);
                }
            });
        });

        cargarCarrito();
        function cargarCarrito()
        {
            $.ajax({
                url:'accion.php',
                method:'get',
                data:{cartItem:"cart-Item"},
                success:function(response)
                {
                    $("#itemCarro").html(response);
                }
            });
        }
    });
</script>

</html>