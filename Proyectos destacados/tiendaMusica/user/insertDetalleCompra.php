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

            session_start();
            $idCompra=$_SESSION['newIdCompra'];
            $idProducto=$_GET['idProducto'];
            $cantProductos=1;
        
            $sql="INSERT INTO detalle_compra (idCompra,idProducto,cantProductos) VALUES('$idCompra','$idProducto','$cantProductos')";
            $query=mysqli_query($connection,$sql);

            if($query){
                header('location: product.php');
            }
            else {
                echo 'Error al agregar, inténtelo de nuevo';
            }
        
    ?>
</body>
</html>
