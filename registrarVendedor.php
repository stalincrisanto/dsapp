<?php
  if(isset($_POST["registro_vendedor"]) && ($_POST["registro_vendedor"]=="Registrar"))
  {
    include './services/serviciosVendedor.php';
    insertarVendedor($_POST["nombre_local"],$_POST["direccion_local"],$_POST["telefono_local"],
    $_POST["nombre_propietario"],$_POST["apellido_propietario"],$_POST["email_propietario"],$_POST["contraseña"],
    $_POST["categoria"],);
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Registro | DSAPP</title>
  <script src="jquery/jquery-3.5.1.min.js"></script>
  <!-- JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <!-- 
      RTL version
  -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--BOOTSTRAP-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>

  <div class="content mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
      <div class="card card-info">
    <div class="card-header text-center">
      <h3 class="card-title">Registro de Vendedor</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="#" name="forma_vendedor" method="post" name="forma" class="form-horizontal">
      <div class="card-body">
        <div class="form-group row">
          <label for="nombre_local" class="col-sm-3 col-form-label">Nombre del Local</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nombre_local" placeholder="Nombre del local">
          </div>
        </div>
        <div class="form-group row">
          <label for="direccion_local" class="col-sm-3 col-form-label">Dirección del Local</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="direccion_local" placeholder="Dirección del local">
          </div>
        </div>
        <div class="form-group row">
          <label for="telefono_local" class="col-sm-3 col-form-label">Teléfono del Local</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="telefono_local" placeholder="Teléfono del local">
          </div>
        </div>
        <div class="form-group row">
          <label for="nombre_propietario" class="col-sm-3 col-form-label">Nombre del propietario</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nombre_propietario" placeholder="Nombre del propietario">
          </div>
        </div>
        <div class="form-group row">
          <label for="apellido_propietario" class="col-sm-3 col-form-label">Apellido del propietario</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="apellido_propietario" placeholder="Apellido del propietario">
          </div>
        </div>
        <div class="form-group row">
          <label for="email_propietario" class="col-sm-3 col-form-label">Email del propietario</label>
          <div class="col-sm-9">
            <input type="mail" class="form-control" name="email_propietario" placeholder="Email del propietario">
          </div>
        </div>
        <div class="form-group row">
          <label for="contraseña" class="col-sm-3 col-form-label">Ingrese una contraseña</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
          </div>
        </div>
        <div class="form-group row">
          <label for="categoria1" class="col-sm-3 col-form-label">Ingrese una categoría</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="categoria" placeholder="Categoría">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <input type="submit" id="agregado" class="btn btn-info" name="registro_vendedor" value="Registrar" class="btn btn-info">
        <a href="index.php" class="btn btn-danger float-right">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
</body>
</html>
