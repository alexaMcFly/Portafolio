<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Pagar</title>
</head>
<body><br>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="mensaje">De qué forma desea pagar</label></div></div>
    
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
        
            <form action="insertPago.php" method="post">
            <div class="col-2"></div>
            <div class="col-5">

                <label for="formaPago">Forma de pago:</label>
                <select name="formaPago">
                    <option value="">Selecciona</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Transferencia</option>
                    <option value="3">Tarjeta de crédito</option>
                    <option value="4">PayPal</option>
                </select>
            <br><br>

                <button type="submit" class="button" name="insertPago"><span>Registrar</span></button>
            </div>
            </form>
        </div>    

        <div class="col-2"></div>
        <div class="col-1"><button name="regresar"><a href="product.php">Regresar</a></button></div>
    </div>    
</body>
</html>