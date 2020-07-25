<?php
  if(isset($_POST["registro_cliente"]) && ($_POST["registro_cliente"]=="Registrar"))
  {
    include './services/serviciosVendedor.php';
    insertarCliente($_POST["nombre_cliente"],$_POST["apellido_cliente"],$_POST["cedula_cliente"],
    $_POST["telefono_cliente"],$_POST["email_cliente"],$_POST['contraña_cliente'],$_POST["direccion_cliente"]);
    //header("location: chatCliente.php");AQUI DEBERIA IR A LA PAGINA PRINCIPAL DE INFORMACIÓN 
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
                    <img src="images/signup-img2.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                        <h2>Registrar Nuevo Cliente</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nombre_cliente">Nombre :</label>
                                <input type="text" name="nombre_cliente" placeholder="Ingrese su nombre" required="">
                            </div>
                            <div class="form-group">
                                <label for="apellido_cliente">Apellido :</label>
                                <input type="text" name="apellido_cliente" placeholder="Ingrese su apellido" required="">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="cedula_cliente">Cédula:</label>
                            <input type="text" name="cedula_cliente" placeholder="Ingrese su cédula" required/>
                        </div><br>
                        <div class="form-group">
                            <label for="telefono_cliente">Teléfono :</label>
                            <input type="text" name="telefono_cliente" placeholder="Ingrese su teléfono" required/>
                        </div><br>
                        <div class="form-group">
                            <label for="email_cliente">E-mail:</label>
                            <input type="email" name="email_cliente" placeholder="Ingrese su correo electrónico" required/>
                        </div><br>
                        <div class="form-group">
                            <label for="contraña_cliente">Contraseña:</label>
                            <input type="password" name="contraña_cliente" placeholder="Ingrese una contraseña" required/>
                        </div><br>
                        <div class="form-group">
                            <label for="direccion_cliente">Dirección:</label>
                            <input type="text" name="direccion_cliente" placeholder="Ingrese su dirección" required/>
                        </div><br>
                        <div class="form-submit">
                            <input type="submit" id="submit" class="submit" name="registro_cliente" value="Registrar">
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