<?php
    include 'connection.php';

    $idProducto=$_POST['idProducto'];
    $nif_empresa=$_POST['nif_empresa'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $modelo=$_POST['modelo'];
    $marca=$_POST['marca'];
    $stock=$_POST['stock'];
    $imagen=$_FILES['imagen']['tmp_name'];
    $ruta='img/'.$_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);

    $sql="UPDATE producto SET nif_empresa='$nif_empresa', nombre='$nombre', precio='$precio', modelo='$modelo', marca='$marca', stock='$stock', imagen='$ruta' WHERE idProducto='$idProducto'";
    $query=mysqli_query($connection,$sql);
    
    if($query){
        header('location: product.php');
    }
    else{
        echo 'Error al actualizar, inténtelo de nuevo';
    }

?>