<?php
  if(isset($_POST["registro_vendedor"]) && ($_POST["registro_vendedor"]=="Registrar"))
  {
    $imagen = $_FILES['imagen_local']['name'];
    $archivo = $_FILES['imagen_local']['tmp_name'];
    $ruta = "images/".$imagen;
    move_uploaded_file($archivo,$ruta);
    include './services/serviciosVendedor.php';
    insertarVendedor($_POST["nombre_local"],$_POST["direccion_local"],$_POST["telefono_local"],$ruta,
    $_POST["nombre_propietario"],$_POST["apellido_propietario"],$_POST["email_propietario"],$_POST["contraseña"],
    $_POST["categoria"]);
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Vendedor</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts_registro/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css_registro/style.css">

</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                        <h2>Registrar Nuevo Vendedor</h2>
                        <div class="form-group">
                            <label for="nombre_local">Nombre del Local:</label>
                            <input type="text" name="nombre_local" placeholder="Ingrese el nombre del Local" required/>
                        </div>
                        <div class="form-group">
                            <label for="direccion_local">Dirección del Local:</label>
                            <input type="text" name="direccion_local" placeholder="Ingrese la dirección del Local" required/>
                        </div>
                        <div class="form-group">
                            <label for="telefono_local">Teléfono del Local:</label>
                            <input type="text" name="telefono_local" placeholder="Ingrese el teléfono del Local" required/>
                        </div>
                        <div class="form-group">
                            <label for="imagen_local">Imagen:</label>
                            <input type="file" name="imagen_local" placeholder="Imagen del Local" required/>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nombre_propietario">Nombre del propietario :</label>
                                <input type="text" name="nombre_propietario" placeholder="Nombre del Propietario" required="">
                            </div>
                            <div class="form-group">
                                <label for="apellido_propietario">Apellido del propietario :</label>
                                <input type="text" name="apellido_propietario" placeholder="Apellido del Propietario" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_propietario">Email del Propietario:</label>
                            <input type="text" name="email_propietario" placeholder="Ingrese el email del propietario" required/>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" name="contraseña" placeholder="Ingrese una contraseña" required/>
                        </div>
                        <div class="form-group">
                            <label for="categoria1">Categoría de sus productos:</label>
                            <input type="text" name="categoria" placeholder="Ingrese la categoría de su producto (zapatos, ropa, viveres)" required/>
                        </div>

                        <div class="form-submit">
                            <input type="submit" id="submit" class="submit" name="registro_vendedor" value="Registrar">
                            <a href="index.php"  id="" class="submit">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js_registro/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>