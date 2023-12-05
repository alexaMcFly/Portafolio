<?php
    include("connection.php");

    $rfc= $_POST['rfc'];
    $nombre= $_POST['nombre'];
    echo $nombre;
    echo $rfc;
    $sql="INSERT INTO clientes VALUES('$rfc','$nombre')";
    $query=mysqli_query($connection,$sql);

    if($query){
        header('location: cliente.php');
    }
    else {
        echo 'Error al insertar, inténtelo de nuevo';
    }
?>