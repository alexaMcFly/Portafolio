<html>
<?php
    include 'connection.php';

        $fecha=$_POST['fecha'];
        $subtotal=$_POST['subtotal'];
        $iva=$_POST['iva'];
        $total=$_POST['total'];
        $idCliente=$_POST['idCliente'];
        $factura=$_POST['factura'];
        
        echo $factura;

        $sql="INSERT INTO compra VALUES('','$fecha','$subtotal','$iva','$total','$idCliente','$factura')";
        $query=mysqli_query($connection,$sql);

        if($query){
            header('location: compra.php');
        }
        else {
            echo 'Error al insertar, inténtelo de nuevo';
        }
    
?>
</html>