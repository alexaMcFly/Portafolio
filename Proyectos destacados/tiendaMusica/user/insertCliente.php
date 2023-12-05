<?php
    include 'connection.php';

        $idCliente=$_POST['idCliente'];
        $nombre=$_POST['nombre'];
        $apPat=$_POST['apPat'];
        $apMat=$_POST['apMat'];        
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $estado=$_POST['estado'];
        $ciudad=$_POST['ciudad'];
        $codPostal=$_POST['codPostal'];
        $rfc=$_POST['rfc'];
       
        $sql="INSERT INTO cliente VALUES('$idCliente','$nombre','$apPat','$apMat','$telefono','$correo','$estado','$ciudad','$codPostal','$rfc')";
    
        $query=mysqli_query($connection,$sql);

        if($query){
            header('location: cliente.php');
        }
        else {
            echo 'Error al insertar, inténtelo de nuevo';
        }
    
?>