<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSAPP | COMPRAS</title>

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
        <a class="navbar-brand" href="./index.php"><i class="fa fa-shopping-bag"></i>&nbsp; Nombre Tienda</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="./index.php">Productos</a>
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
        <div class="" id="message"></div>
        <div class="row mt-2 pb-3">
            <?php
                include './config.php';
                $stmt = $conexion->prepare("SELECT * FROM producto");
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc())
                {
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card-deck">
                    <div class="card p-2 border-secondary mb-2">
                        <img src="<?php echo $row["imagen_producto"] ?>" class="card-img-top" height="250">
                        <div class="card-body p-1">
                            <h4 class="card-title text-center text-info"><?= $row["nombre_producto"] ?></h4>
                            <h5 class="card-text text-center text-danger"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo number_format($row["precio_producto"],2) ?></h5>
                        </div>
                        <div class="card-footer p-1">
                            <form action="" class="form-submit">
                                <input type="hidden" name="" class="idProducto" value="<?= $row["id_producto"] ?>">
                                <input type="hidden" name="" class="nombreProducto" value="<?= $row["nombre_producto"] ?>">
                                <input type="hidden" name="" class="precioProducto" value="<?= $row["precio_producto"] ?>">
                                <input type="hidden" name="" class="imagenProducto" value="<?= $row["imagen_producto"] ?>">
                                <button class="btn btn-info btn-block addItemBtn"><i class="fa fa-cart-plus"></i> Añadir a Carrito</button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <?php } ?>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var idProducto = $form.find(".idProducto").val();
            var nombreProducto = $form.find(".nombreProducto").val();
            var precioProducto = $form.find(".precioProducto").val();
            var imagenProducto = $form.find(".imagenProducto").val();
            $.ajax({
                url:"accion.php",
                method:"post",
                data:{idProducto:idProducto,nombreProducto:nombreProducto,precioProducto:precioProducto,imagenProducto:imagenProducto},
                success:function(response)
                {
                    $("#message").html(response);
                    window.scrollTo(0,0);
                    cargarCarrito();
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