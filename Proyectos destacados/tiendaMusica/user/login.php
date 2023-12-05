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

        $sqlUser="SELECT*FROM usuario WHERE user='$user' AND pass='$contrasena'";
        $sqlCli="SELECT idCliente FROM cliente WHERE usuario='$user'";

        $queryUser=mysqli_query($connection,$sqlUser);
        $queryCli=mysqli_query($connection,$sqlCli);
        $rowCli = mysqli_fetch_array($queryCli);
        $_SESSION['cliente']=$rowCli['idCliente'];

        $numRowUser=mysqli_num_rows($queryUser);

        if($numRowUser>0 && $queryCli){
            
            $idCliente=$_SESSION['cliente'];
            
            $sqlCompra="SELECT * FROM compra WHERE idCompra=(SELECT max(idCompra) FROM compra WHERE idCliente='$idCliente')";
            $queryCompra=mysqli_query($connection,$sqlCompra);
            $rowCompra=mysqli_fetch_array($queryCompra);
            $idCompra=$rowCompra['idCompra']; 
            $_SESSION['newIdCompra']=$idCompra;

            $sqlPago="SELECT idPago FROM pago WHERE idCompra='$idCompra'";
            $queryPago=mysqli_query($connection,$sqlPago);
            $numRowPago=mysqli_num_rows($queryPago);

            if($numRowPago>0){
                $sqlNewCompra="INSERT INTO compra (idCompra,fecha,subtotal,iva,total,idCliente) VALUES(NULL,curdate(), 0, 0, 0,'$idCliente')";
                $queryNewCompra=mysqli_query($connection,$sqlNewCompra);
                $idCompra+=1;
                $_SESSION['newIdCompra']=$idCompra;
            }
            else{
                $_SESSION['idCompra']=$idCompra;
                echo $_SESSION['idCompra'];
            }
            
            echo '<script type="text/javascript">alert("Bienvenido!!");window.location.href="index.php";</script>';
            
        }
        else{
            echo '<script type="text/javascript">alert("Usuario o contraseña incorrectos");window.location.href="formLogin.php";</script>';
        }


    ?>    
</body>
</html>


