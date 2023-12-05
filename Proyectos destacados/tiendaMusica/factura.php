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
    <title>Factura</title>
</head>
<body><br>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Facturas</label></div></div>
    <div class="row">
        <div class="col-2"></div>
        <center>
        <div class="tabla">
        <table>
	
                <thead>
					<tr>
						<th>No Factura</th>
                        <th>Id Compra</th>
						<th>Fecha</th>
                        <th>RFC</th>
                        <th></th>
                        <th></th>
					</tr>
				</thead>
				<br><br>
				<tbody>
					<?php
                        
						$sqlD = "SELECT * FROM factura";
						$queryD = mysqli_query($connection,$sqlD);

						while ($row = mysqli_fetch_array($queryD)) {?>
							<tr>
                                <td><?php echo $row['noFactura']; ?></td>
								<td><a href="detalleCompra.php?idCompra=<?php echo $row['idCompra']?>">
                                        <?php echo $row['idCompra']; ?>
                                    </a>
                                </td>
								<td><?php echo $row['fechaFac']; ?></td>
								<td><?php echo $row['rfc']; ?></td>
								<td>
                                    <a href="formUpdateFactura.php?idFactura=<?php echo $row['idFactura']?>" class="btn btn-primary boton">
                                        <?php print("<img src='images/edit_white.ico' height='26'>"); ?>
                                    </a>
                                </td>
                                <td> 
                                    <a href="deleteFactura.php?idFactura=<?php echo $row['idFactura']?>" class="btn btn-danger" onclick="return confirmDelete()">
                                        <?php print("<img src='images/delete_white.ico' height='26'>"); ?>
                                    </a>
								</td>
							</tr>
					<?php } ?>
				</tbody>

			</table><br><br>
        </div></center>
        
        <div class="col-2"></div>
        <div class="col-1"><button name="regresar"><a href="compra.php">Regresar</a></button></div>
    </div>    
</body>
</html>