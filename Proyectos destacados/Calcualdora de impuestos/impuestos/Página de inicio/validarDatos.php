<?php
        include 'Conexión.php';
        
        $usuario = $_POST ["usuario"];
        $password = $_POST ["password"];
        

        $sql="INSERT INTO usuarios VALUES('','$usuario','$password')";
        $query= mysqli_query($connection,$sql);

        if($query){
        	echo '<script type="text/javascript">alert("Usuario registrado con éxito!!!!");window.location.href="Inicio.html";</script>';
        }				
        else{
            echo "¡Error al insertar!  Intente ingresar los datos de nuevo. <br> <br>Es posible que el nombre de usuario o el email introducidos ya exista";
        }
?>


