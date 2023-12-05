<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Crear Cuenta</title>
</head>
<body>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Crear Cuenta</label></div></div><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
        
            <form action="signUp.php" method="post">
            <div class="col-2"></div>
            <div class="col-2">

                <label for="user">Nombre de usuario:</label>
                <input type="text" name="user" maxlength="20"><br><br>

                <label for="email">Apellido Paterno:</label>
                <input type="email" name="email" maxlength="45"><br><br>

                <label for="pass">Comtraseña:</label>
                <input type="password" name="pass" maxlength="20"><br><br>

                <button type="submit" class="button" name="insertUsuario"><span>Registrar</span></button>
            </div>
            </form>
        </div>    
</body>
</html>