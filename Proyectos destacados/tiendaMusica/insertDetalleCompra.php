<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Detalle Compra</title>
</head>
<body>
    <?php
        include 'connection.php';

            $idCompra=$_POST['idCompra'];
            $idProducto=$_POST['idProducto'];
            $cantProductos=$_POST['cantProductos'];
        
            $sql="INSERT INTO detalle_compra (idCompra,idProducto,cantProductos) VALUES('$idCompra','$idProducto','$cantProductos')";
            $query=mysqli_query($connection,$sql);
            
            $location='location: detalleCompra.php?idCompra='.$idCompra;

            if($query){
                header($location);
            }
            else {
                echo 'Error al insertar, inténtelo de nuevo';
            }
        
    ?>
</body>
</html>
