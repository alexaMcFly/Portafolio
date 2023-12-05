<?php
    include 'connection.php';
    $idCompra=$_GET['idCompra'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Detalles de Compra</title>
</head>
<body><br>
    <script type="text/javascript">

		function confirmDelete(){
			var respuesta = confirm("¿Realmente desea eliminar este producto de la compra?");

			if(respuesta == true){
				return true;
			}else{
				return false;   
			}
		}   

	</script>
    <div class="row"><div class="col-4"></div><div class="col-4"><label class="titulo">Detalles de la Compra</label></div></div>
    <hr size="2" color="black" width="80%"></hr>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
        
            <form action="insertDetalleCompra.php" method="post">
            <div class="col-2"></div>
            <div class="col-5">

                <input type="hidden" name="idCompra" value="<?php echo $idCompra;?>">

                <label for="idProducto">Producto:</label>
                <select name="idProducto">
    
                    <option value="">Selecciona el producto</option>
                    <?php
                        $sqlP="SELECT idProducto, nombre, marca FROM producto";
                        $queryP=mysqli_query($connection,$sqlP);
                        foreach($queryP as $options){?>
                            <option value="<?php echo $options['idProducto'];?>"><?php echo $options['nombre']." / ".$options['marca'];?></option>
                    <?php
                        }
                    ?>
                </select>
                    
                <br><br>
                
                <label for="cantProductos">Cantidad de Productos:</label>
                <input type="number" id="cantProductos" name="cantProductos" oninput="calcularImporte()"><br><br>

                <button type="submit" class="button" name="insertDetalleCompra"><span>Registrar</span></button>
            </div>
            </form>
        </div>    
        <div class="col-2"></div>
        <center>
        <div class="tabla">
        <table>
	
                <thead>
					<tr>
						<th>Id Producto</th>
                        <th>Cantidad</th>
						<th>Importe</th>
                        <th></th>
                        <th></th>
					</tr>
				</thead>
				<br><br>
				<tbody>
					<?php
                        
						$sqlD = "SELECT * FROM detalle_compra WHERE idCompra='$idCompra'";
						$queryD = mysqli_query($connection,$sqlD);

						while ($row = mysqli_fetch_array($queryD)) {?>
							<tr>
								<td><?php echo $row['idProducto']; ?></td>
								<td><?php echo $row['cantProductos']; ?></td>
								<td><?php echo $row['importe']; ?></td>
								<td>
                                    <a href="formUpdateCompra.php?idCompra=<?php echo $row['idCompra']?>" class="btn btn-primary boton">
                                        <?php print("<img src='images/edit_white.ico' height='26'>"); ?>
                                    </a>
                                </td>
                                <td> 
                                    <a href="deleteCompra.php?idCompra=<?php echo $row['idCompra']?>" class="btn btn-danger" onclick="return confirmDelete()">
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