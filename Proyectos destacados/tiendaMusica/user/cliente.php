<?php
    include 'connection.php';
    $sql="SELECT* FROM cliente";
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
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Cliente</label></div></div><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
        
            <form action="insertCliente.php" method="post">
            <div class="col-2"></div>
            <div class="col-2">

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" maxlength="20"><br><br>

                <label for="apPat">Apellido Paterno:</label>
                <input type="text" name="apPat" maxlength="20"><br><br>

                <label for="apMat">Apellido Materno:</label>
                <input type="text" name="apMat" maxlength="20"><br><br>

                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" maxlength="10"><br><br>

                <label for="correo">Email:</label>
                <input type="email" name="correo" maxlength="40"><br><br>

                <label for="estado">Estado:</label>
                <input type="text" name="estado" maxlength="25"><br><br>
                
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" maxlength="25" required><br><br>

                <label for="codPostal">Código Postal:</label>
                <input type="text" name="codPostal" maxlength="5" required><br><br>
                
                <label for="rfc">RFC:</label>
                <input type="text" name="rfc" maxlength="13"><br><br>

                <button type="submit" class="button" name="insertCliente"><span>Registrar</span></button>
            </div>
            </form>
        </div>    
        <div class="col-2"></div>
        <center>
        <div class="tabla">
        <table>
				<thead>
					<tr>
						<th>Id Cliente</th>
                        <th>Nombre</th>
						<th>Ap Paterno</th>
						<th>Ap Materno</th>
						<th>Teléfono</th>
						<th>Email</th>
						<th>Estado</th>
                        <th>Ciudad</th>
                        <th>Cod Postal</th> 
                        <th>RFC</th> 
					</tr>
				</thead>
				<br><br>
				<tbody>
					<?php
						$query = mysqli_query($connection,$sql);

						while ($row = mysqli_fetch_array($query)) {?>
							<tr>
								<td><?php echo $row['idCliente']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['apPat']; ?></td>
								<td><?php echo $row['apMat']; ?></td>
								<td><?php echo $row['telefono']; ?></td>
								<td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['estado']; ?></td>
                                <td><?php echo $row['ciudad']; ?></td>
                                <td><?php echo $row['codPostal']; ?></td>
                                <td><?php echo $row['rfc']; ?></td>
								<td>
                                    <a href="formUpdateCliente.php?idCliente=<?php echo $row['idCliente']?>" class="btn btn-primary">
                                        <?php print("<img src='images/edit_white.ico' height='26'>"); ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="deleteCliente.php?idCliente=<?php echo $row['idCliente']?>" class="btn btn-danger" onclick="return confirmDelete()">
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