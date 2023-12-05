<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body><br>
    <div class="row"><div class="col-10"></div><div class="col-1"><label class="subtitulo"><?php session_start(); echo $_SESSION['usuario'];?></label></div></div>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Casa de Musica</label></div></div><br><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-1"><button name="regresar"><a href="product.php">Productos</a></button></div>
        <div class="col-1"><button name="regresar"><a href="compra.php">Compras</a></button></div>
        <div class="col-1"><button name="regresar"><a href="cliente.php">Clientes</a></button></div>
        <div class="col-1"><button name="regresar"><a href="empresa.php">Empresas</a></button></div>
        <div class="col-1"><button name="regresar"><a href="factura.php">Facturas</a></button></div>
        <div class="col-1"><button name="regresar"><a href="pago.php">Pagos</a></button></div>

    </div>    
</body>
</html>