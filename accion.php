<?php
    session_start();
    require("./config.php");

    if(isset($_POST["idProducto"]))
    {
        $idProducto = $_POST["idProducto"];
        $nombreProducto = $_POST["nombreProducto"];
        $precioProducto = $_POST["precioProducto"];
        $imagenProducto = $_POST["imagenProducto"];
        $cantidad = 1;
        
        $stmt = $conexion->prepare("SELECT id_producto FROM carro_compra WHERE id_producto=?");
        $stmt->bind_param("i",$idProducto);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r["id_producto"];
        
        if(!$code)
        {
            $query = $conexion->prepare("INSERT INTO carro_compra (id_producto,nombre_producto,precio_producto,imagen_producto,cantidad,precio_total)
            VALUES(?,?,?,?,?,?)");
            $query->bind_param("isdsid",$idProducto,$nombreProducto,$precioProducto,$imagenProducto,$cantidad,$precioProducto);
            $query->execute();
            echo('<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Producto añadido al carrito</strong> 
                  </div>');
        }
        else
        {
            echo('<div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>El producto ya ha sido añadido previamente</strong> 
                  </div>');

        }
    }

    if(isset($_GET["cartItem"]) && isset($_GET["cartItem"])=="cart-Item")
    {
        $stmt = $conexion->prepare("SELECT * FROM carro_compra");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows();
        echo $rows;
    }

    if(isset($_GET["remove"]))
    {
        echo("VALOR!!".$_GET["remove"]);
        $id = $_GET["remove"];
        $stmt = $conexion->prepare("DELETE FROM carro_compra WHERE id_producto=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Producto eliminado del carro de compras';
        header('location:carro_compra.php');
    }

    if(isset($_GET["clear"]))
    {
        $stmt = $conexion->prepare("DELETE FROM carro_compra");
        $stmt->execute();
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Sin productos en el carro de compras';
        header('location:carro_compra.php');
    }
?>