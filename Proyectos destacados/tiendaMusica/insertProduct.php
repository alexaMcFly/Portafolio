<html>
<?php
    include 'connection.php';

        $idProducto=$_POST['idProducto'];
        $empresa=$_POST['nif_empresa'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $modelo=$_POST['modelo'];
        $marca=$_POST['marca'];
        $stock=$_POST['stock'];
        $imagen=$_FILES['imagen']['tmp_name'];
        $ruta='img/'.$_FILES['imagen']['name'];
        echo '<pre>';
        print_r($_FILES['imagen']['tmp_name']);
        echo '</pre>';
        print_r($ruta); 
        move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
        $sql="INSERT INTO producto VALUES('$idProducto','$empresa','$nombre','$precio','$modelo','$marca','$stock','$ruta')";
        $query=mysqli_query($connection,$sql);

        if($query){
            header('location: product.php');
        }
        else {
            echo 'Error al insertar, inténtelo de nuevo';
        }
    
?>
</html>