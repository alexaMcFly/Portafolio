<?php
        include 'connection.php';
        /*USUARIO */
        $user = $_POST ["user"];
        $email=$_POST['email'];
        $pass = $_POST ["pass"];
        $contrasena = hash("sha512", $pass);

        /*cliente */
        $idCliente=$_POST['idCliente'];
        $nombre=$_POST['nombre'];
        $apPat=$_POST['apPat'];
        $apMat=$_POST['apMat'];        
        $telefono=$_POST['telefono'];
        $estado=$_POST['estado'];
        $ciudad=$_POST['ciudad'];
        $codPostal=$_POST['codPostal'];
        $rfc=$_POST['rfc'];
       
        $sqlU="INSERT INTO usuario VALUES('$user','$email','$contrasena')";
        $queryU= mysqli_query($connection,$sqlU);

        if($queryU){
            $sqlC="INSERT INTO cliente VALUES(NULL,'$nombre','$apPat','$apMat','$telefono','$user','$estado','$ciudad','$codPostal','$rfc')";
            $queryC=mysqli_query($connection,$sqlC);
        }
        else{
            echo '<script type="text/javascript">alert("Datos de Usuario inválidos");window.location.href="formSignUp.php";</script>';
        }

        if($queryC){
        	echo '<script type="text/javascript">alert("Usuario registrado con éxito!!!!");window.location.href="formLogin.php";</script>';
        }				
        else{
            echo "¡Error al insertar!  Intente ingresar los datos de nuevo. <br> <br>Es posible que el nombre de usuario o el email introducidos ya exista";
        }
?>


