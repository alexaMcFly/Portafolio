<?php
    include 'connection.php';

    session_start();
    $idProducto=$_GET['idProducto'];
    $idCompra=$_SESSION['newIdCompra'];

    $sql="DELETE FROM detalle_compra WHERE idProducto='$idProducto' AND idCompra='$idCompra'";
    $query=mysqli_query($connection,$sql);

    if($query){
        header('location: carrito.php');
    }
    else{
        echo 'Error al eliminar, inténtelo de nuevo';
    }
?>