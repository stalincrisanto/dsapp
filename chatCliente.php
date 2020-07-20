<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>AQUI VIENE EL CHAT PARA ELEGIR A LA TIENDA</h1>
    <form action="compras.php" method="post">
        <div class="form-group row" id="editar">
            <label for="nombreProducto" id="lblNombreProducto" class="col-sm-3 col-form-label">Tipo de producto</label>
            <div class="col-sm-7">
                <input type="text" name="tipoProducto" value="" require class="form-control">
            </div>
        </div>
        <div class="form-group row" id="editar">
            <label for="nombreProducto" id="lblNombreProducto" class="col-sm-3 col-form-label">Direccion</label>
            <div class="col-sm-7">
                <input type="text" name="direccion" value="" require class="form-control">
            </div>
        </div>
    </form>
    
</body>
</html>