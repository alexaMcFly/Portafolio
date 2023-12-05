<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login</title>
</head>
<body><br>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Incio de Sesión</label></div></div>
    <hr size="2" color="black" width="80%"></hr>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-3">
        
            <form action="login.php" method="post">
            <div class="col-2"></div>
            <div class="col-5">

                <label for="user">Usuario:</label>
                <input type="text" name="user" maxlength="20">

                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" maxlength="20"><br><br>

                <button type="submit" class="button" name="login"><span>Ingresar</span></button>
            </div>
            </form>
        </div>    
        
    </div>    
</body>
</html>