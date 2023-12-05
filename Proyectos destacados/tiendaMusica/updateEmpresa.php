<?php
    include 'connection.php';

    $nif_empresa=$_POST['nif_empresa'];
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];

    $sql="UPDATE empresa SET nombre='$nombre', correo='$correo' WHERE nif_empresa='$nif_empresa'";
    $query=mysqli_query($connection,$sql);
    
    if($query){
        header('location: empresa.php');
    }
    else{
        echo 'Error al actualizar, inténtelo de nuevo';
    }

?>