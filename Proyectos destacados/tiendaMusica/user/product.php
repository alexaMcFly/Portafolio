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
<div class="row"><div class="col-9"></div><div class="col-1"><button name="regresar"><a href="carrito.php">Carrito</a></button></div><div class="col-1"><label class="subtitulo"><?php session_start(); echo $_SESSION['usuario'];?></label></div></div>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Productos</label></div></div>

        <div class="col-2"></div>
        <center>
        <div class="tabla">
        <table>
	
                <thead>
					<tr>
						<th>Id producto</th>
						<th>Empresa</th>
                        <th>Nombre</th>
						<th>Precio</th>
						<th>Modelo</th>
						<th>Marca</th>
						<th>Stock</th>
						<th>Imagen</th>
                        <th></th>
                        <th></th>
					</tr>
				</thead>
				<br><br>
				<tbody>
					<?php
						$sqlP = "SELECT * FROM producto";
						$queryP = mysqli_query($connection,$sqlP);

						while ($row = mysqli_fetch_array($queryP)) {?>
							<tr>
								<td><?php echo $row['idProducto']; ?></td>
								<td><?php echo $row['nif_empresa']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['precio']; ?></td>
								<td><?php echo $row['modelo']; ?></td>
								<td><?php echo $row['marca']; ?></td>
                                <td><?php echo $row['stock']; ?></td>
                                <td><img src="<?php echo $row['imagen'];?>" width="180px"></td>
								<td>
                                    <a href="insertDetalleCompra.php?idProducto=<?php echo $row['idProducto']?>" class="btn btn-primary boton">
                                        <?php print("Agregar"); ?>
                                    </a>
                                </td>
                                <td> 
                                    <a href="deleteProduct.php?idProducto=<?php echo $row['idProducto']?>" class="btn btn-danger" onclick="return confirmDelete()">
                                        <?php print("Ver"); ?>
                                    </a>
								</td>
							</tr>
					<?php } ?>
				</tbody>

			</table>
        </div></center>
    </div>    
</body>
</html>