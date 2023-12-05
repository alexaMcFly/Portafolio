<?php
    include 'connection.php';
    session_start();
    $idCompra=$_SESSION['newIdCompra'];      

?>

<?php

    if( isset($_POST['submit'])){
        $cantProductos=$_POST['cantProductos'];
        
        if($cantProductos>0){
            
            $idProducto=$_POST['idProducto'];
       
            $sql="UPDATE detalle_compra SET cantProductos='$cantProductos' WHERE idProducto='$idProducto' AND idCompra='$idCompra'";
            $query=mysqli_query($connection,$sql);
    
            if($query){
                header('location: carrito.php');
            }
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <script type="text/javascript" src="clicks.js" defer></script>
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

    <div class="row"><div class="col-10"></div><div class="col-1"><label class="subtitulo"><?php echo $_SESSION['usuario'];?></label></div></div><div class="imgUser"><img src='images/cross_icon.ico' height='26'></div>
    <div class="row"><div class="col-4"></div><div class="col-4"><label class="titulo">Detalles de la Compra</label></div></div>
    
        <div class="col-2"></div>
        <center>
        <div class="tabla">
        <table>
	
                <thead>
					<tr>
						<th>Producto</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
						<th>Importe</th>
                        <th></th>
					</tr>
				</thead>
				<br><br>
				<tbody id="columna">
					<?php
                        
						$sqlD = "SELECT * FROM detalle_compra WHERE idCompra='$idCompra'";
						$queryD = mysqli_query($connection,$sqlD);
                        $i=0;
						while ($row = mysqli_fetch_array($queryD)) {?>
							<tr>
                                <?php
                                    $i++;//se incrementa el contador que controla el nombre de las variables del boton del formulario de cada producto que contenga el carrito
                                    $idProducto=$row['idProducto'];
                                    $sqlP = "SELECT * FROM producto WHERE idProducto='$idProducto'";
                                    $queryP = mysqli_query($connection,$sqlP);
                                    $rowP = mysqli_fetch_array($queryP);
                                ?>
								<td><?php echo $rowP['nombre']; ?></td>
								<td><img src="<?php echo $rowP['imagen'];?>" width="180px"></td>
                                <td>

                                    <form action='carrito.php' method="POST">
                                        <input type="number" class="cant" name="cantProductos" min="1" value="<?php echo $row['cantProductos'];?>" style="width: 50px;">    
                                        <input type="hidden" name="idProducto" value="<?php echo $row['idProducto']?>">
                                        <button type="submit" name="submit" class="hidden"></button>
                                    </form>

                                </td>
								<td><?php echo $row['importe']; ?></td>
								<td>
                                    <a href="formUpdateCompra.php?idCompra=<?php echo $row['idCompra']?>" class="btn btn-primary boton">
                                        <?php print("<img src='images/edit_white.ico' height='26'>");?>
                                    </a>
                                </td>
                                <td> 
                                    <a href="deleteDetalleCompra.php?idProducto=<?php echo $row['idProducto']?>" class="btn btn-danger" onclick="return confirmDelete()">
                                        <?php print("<img src='images/delete_white.ico' height='26'>"); ?>
                                    </a>
								</td>
							</tr>

                        <?php } ?>
				</tbody>

			</table><br><br>
        </div></center>

        <div class="row">
        <div class="col-2"></div>
        <div class="col-1"><button name="regresar"><a href="product.php">Regresar</a></button></div>
        <div class="col-5"></div>
        <div class="col-2"><button name="regresar"><a href="pagar.php">Terminar Compra</a></button></div>
        </div>
    </div>    <br><br><br>
</body>
</html>
