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
    <title>Inicio</title>
</head>
<body><br>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Empresa</label></div></div><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
        
            <form action="insertEmpresa.php" method="post">
            <div class="col-2"></div>
            <div class="col-5">
                <label for="nif_empresa">NIF Empresa:</label>
                <input type="text" name="nif_empresa" minlength="5" maxlength="20" required><br><br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" maxlength="35"><br><br>

                <label for="correo">Email:</label>
                <input type="text" name="correo" maxlength="40"><br><br><br>

                <button type="submit" class="button" name="insertEmpresa"><span>Registrar</span></button>
            </div>
            </form>
        </div>    
        <div class="col-2"></div>
        <center>
        <div class="tabla">
        <table>
            <thead>
                <tr>
                    <th>NIF Empresa</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <br><br>
            <tbody>
                <?php
                    $sql= "SELECT * FROM empresa";
                    $query = mysqli_query($connection,$sql);

                    while ($row = mysqli_fetch_array($query)) {?>
                        <tr>
                            <td><?php echo $row['nif_empresa']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['correo']; ?></td>
                            <td>
                                <a href="formUpdateEmpresa.php?nif_empresa=<?php echo $row['nif_empresa']?>" class="btn btn-primary">
                                    <?php print("<img src='images/edit_white.ico' height='26'>"); ?>
                                </a>
                            </td>
                            <td>
                                <a href="deleteEmpresa.php?nif_empresa=<?php echo $row['nif_empresa']?>" class="btn btn-danger" onclick="return confirmDelete()">
                                    <?php print("<img src='images/delete_white.ico' height='26'>"); ?>
                                </a>
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
		</table>
        </div>
        </center>
    </div>    
</body>
</html>