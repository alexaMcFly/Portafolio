<?php
    
    include 'connection.php';
    if (isset($_POST['botonAct'])){
        $rfc=$_POST['rfc'];
        $nombre = $_POST ["nombre"];
        echo $rfc;
        echo $nombre;
        $sql="UPDATE clientes SET Nombre='$nombre' WHERE rfc='$rfc'";
        $query=mysqli_query($connection,$sql);

        if($query){
            header("Location: cliente.php");
        }
        else{
            echo "¡Error al actualizar! ";
        }
    }
    

?>