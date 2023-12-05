<?php
    include 'connection.php';

        $nif_empresa=$_POST['nif_empresa'];
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
       
        $sql="INSERT INTO empresa VALUES('$nif_empresa','$nombre','$correo')";
    
        $query=mysqli_query($connection,$sql);

        if($query){
            header('location: empresa.php');
        }
        else {
            echo 'Error al insertar, inténtelo de nuevo';
        }
    
?>