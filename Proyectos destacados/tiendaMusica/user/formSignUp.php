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
        
            <form action="signUp.php" method="post">
            <div class="col-3">
                <div class="row"><div class="col-12"><label class="subtitulo">Datos de usuario</label></div></div><br>
                <div class="row">
                    <div class="col-12">
                        <label for="user">Nombre de usuario:</label>
                        <input type="text" name="user" minlength="7" maxlength="20"><br><br>

                        <label for="email">Email:</label>
                        <input type="email" name="email" minlength="18" maxlength="45"><br><br>

                        <label for="pass">Contraseña:</label>
                        <input type="password" name="pass" minlength="7" maxlength="20"><br><br>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>

            <div class="col-3">
                <div class="row"><div class="col-12"><label class="subtitulo">Nombre Completo</label></div></div><br>
                <div class="row">
                    <div class="col-12">
                    
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" maxlength="20"><br><br>

                        <label for="apPat">Apellido Paterno:</label>
                        <input type="text" name="apPat" maxlength="20"><br><br>

                        <label for="apMat">Apellido Materno:</label>
                        <input type="text" name="apMat" maxlength="20"><br><br>

                        <label for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" maxlength="10"><br><br>

                        <div class="row"><div class="col-12"><label class="subtitulo">Domicilio</label></div></div><br>
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" maxlength="25"><br><br>
                        
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" name="ciudad" maxlength="25" required><br><br>

                        <label for="codPostal">Código Postal:</label>
                        <input type="text" name="codPostal" maxlength="5" required><br><br>
                        
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" maxlength="13"><br><br>

                        <button type="submit" class="button" name="insertUsuario"><span>Registrarme</span></button>
                    </div>
                </div>
            </div>

            
        </form>
    </div>    
</body>
</html>