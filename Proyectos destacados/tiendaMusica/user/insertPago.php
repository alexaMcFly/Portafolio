<html>
<?php
    include 'connection.php';

    $formaPago=$_POST['formaPago'];
        session_start();
        $idCompra=$_SESSION['newIdCompra'];

        $sql="INSERT INTO pago VALUES(NULL,'$idCompra',$formaPago)";
        $query=mysqli_query($connection,$sql);

        if($query){
            $_SESSION['newIdCompra']+=1;
            header('location: product.php');
        }
        else {
            echo 'Error al insertar, inténtelo de nuevo';
        }
    
?>
</html>