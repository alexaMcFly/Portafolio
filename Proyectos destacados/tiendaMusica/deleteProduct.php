<?php
    include 'connection.php';

    $idProducto=$_GET['idProducto'];
    $sql="DELETE FROM producto WHERE idProducto='$idProducto'";
    $query=mysqli_query($connection,$sql);
    
    if($query){
        header('location: product.php');
    }
    else{
        echo 'Error al eliminar, inténtelo de nuevo';
    }

?>