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

    if(isset($_POST["cantidad"]))
    {
        $cantidad = $_POST["cantidad"];
        $idProducto = $_POST["idProducto"];
        $precioProducto = $_POST["precioProducto"];

        $precioTotal = $cantidad*$precioProducto;
        $stmt = $conexion->prepare("UPDATE carro_compra SET cantidad=?, precio_total=? WHERE id_producto=?");
        $stmt->bind_param("idi",$cantidad,$precioTotal,$idProducto);
        $stmt->execute();
    }

    if(isset($_POST['action'])&& isset($_POST['action'])=='orden')
    {
        $nombre=$_POST['nombre'];
        $apellido = $_POST['apellidos'];
        $apellido = $_POST['apellidos'];
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
        $mail = $_POST['mail'];
        $direccion = $_POST['direccion'];
        $granTotal = $_POST['gran_total'];
        $productos = $_POST['productos'];
        $metodoPago = $_POST['metodoPago'];

        $data = '';

        $stmt = $conexion->prepare("INSERT INTO orders(campo1, campo2, campo3) VALUES(?,?,?)");
        $stmt->bind_param("ssss",$nombre,$apellido,$cedula);
        $stmt->execute();
        $data.='<div class="text-center">
                    <h1 class="display-4 mt-2 text-danger">Gracias por utilizar DSAPP</h1>
                    <h2 class="text-success">Su orden ha sido completada y enviada al Vendedor</h2>
                    <h4 class="bg-danger text-light rounded p-2">Artículos Comprados: '.$productos.' </h4>
                </div>';
        echo $data;
    }
?>
