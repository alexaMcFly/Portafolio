<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <?php 
        include 'connection.php';

        $user=$_POST['user'];
        $pass=$_POST['pass'];
        session_start();
        $_SESSION['usuario']=$user;
        $contrasena = hash("sha512", $pass);

        $sql="SELECT*FROM usuario WHERE user='$user' AND pass='$contrasena'";
        $query=mysqli_query($connection,$sql);
        $row=mysqli_num_rows($query);

        if($row>0){
            echo '<script type="text/javascript">alert("Bienvenido!!");window.location.href="index.php";</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Usuario o contraseña incorrectos");window.location.href="formLogin.php";</script>';
        }
    ?>    
</body>
</html>


