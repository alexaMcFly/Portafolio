<?php
    include 'connection.php';

        session_start();
        $idCompra=$_SESSION['newIdCompra'];   
        $cantProductos=$_POST['cantProductos'];
        $idProducto=$_POST['idProducto'];
       
        $sql="UPDATE detalle_compra SET cantProductos='$cantProductos' WHERE idProducto='$idProducto' AND idCompra='$idCompra'";
        $query=mysqli_query($connection,$sql);

        if($query){
            header('location: carrito.php');
        }
        else {
            
            echo 'Error al actualizar, inténtelo de nuevo';
        }
?>