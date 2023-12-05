<?php
        include 'connection.php';
        
        $user = $_POST ["user"];
        $email=$_POST['email'];
        $pass = $_POST ["pass"];

        $contrasena = hash("sha512", $pass);

        $sql="INSERT INTO usuario VALUES('$user','$email','$contrasena')";
        $query= mysqli_query($connection,$sql);

        if($query){
        	echo '<script type="text/javascript">alert("Usuario registrado con éxito!!!!");window.location.href="index.php";</script>';
        }				
        else{
            echo "¡Error al insertar!  Intente ingresar los datos de nuevo. <br> <br>Es posible que el nombre de usuario o el email introducidos ya exista";
        }
?>


