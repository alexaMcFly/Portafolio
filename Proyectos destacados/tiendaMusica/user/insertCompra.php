<html>
<?php
    include 'connection.php';

        session_start();
        $idCliente=$_SESSION['cliente'];

        $sql="INSERT INTO compra VALUES(NULL,curdate(), 0, 0, 0,'$idCliente','$factura')";
        $query=mysqli_query($connection,$sql);

        if($query){
            header('location: product.php');
        }
        else {
            echo 'Error al insertar, inténtelo de nuevo';
        }
    
?>
</html>