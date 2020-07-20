<?php 
    function insertarVendedor($nombrel, $direccionl,$telefonol,
    $nombrep,$apellidop,$emailp,$contraseña,$categoria1)
    {
        include "./config.php";
        //$conexion = getConex();
        $stmt = $conexion->prepare("INSERT INTO tienda (nombre_local,direccion_local,telefono_local,
        nombre_propietario,apellido_propietario,email_propietario,
        contraseña, categoria) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssss',$nombrel, $direccionl,$telefonol,
        $nombrep,$apellidop,$emailp,$contraseña,$categoria1);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
?>