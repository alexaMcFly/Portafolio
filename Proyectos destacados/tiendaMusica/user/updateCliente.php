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
       
        $sql="UPDATE cliente SET nombre='$nombre', apPat='$apPat',apMat='$apMat',telefono='$telefono',correo='$correo',estado='$estado',ciudad='$ciudad',codPostal='$codPostal',rfc='$rfc' WHERE idCliente='$idCliente'";
        $query=mysqli_query($connection,$sql);

        if($query){
            header('location: cliente.php');
        }
        else {
            echo 'Error al actualizar, inténtelo de nuevo';
        }
?>