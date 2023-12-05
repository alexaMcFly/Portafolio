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
    <script type="text/javascript">

		function confirmDelete(){
			var respuesta = confirm("¿Realmente desea eliminar este producto?");

			if(respuesta == true){
				return true;
			}else{
				return false;
			}
		}
	</script>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Producto</label></div></div>
    <hr size="2" color="black" width="80%"></hr>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
        
            <form action="insertProduct.php" method="post" enctype="multipart/form-data">
            <div class="col-2"></div>
            <div class="col-5">
                <label for="idProducto">Id:</label>
                <input type="text" name="idProducto" minlength="5" maxlength="20" required><br><br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" maxlength="35"><br><br>

                <label for="nif_empresa">Empresa:</label>
                <select name="nif_empresa">
                    <option value="">Selecciona la empresa</option>
                    <?php
                        $sql="SELECT* FROM empresa";
                        $query=mysqli_query($connection,$sql);                    
                        foreach($query as $options){?>
                            <option value="<?php echo $options['nif_empresa'];?>"><?php echo $options['nombre'];?></option>
                    <?php
                        }
                    ?>
                </select>
                    
                    <br><br>

                <label for="precio">Precio:</label>
                <input type="number" name="precio" max="9999999.99"><br><br>    
                
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" maxlength="40" required><br><br>

                <label for="marca">Marca:</label>
                <input type="text" name="marca" maxlength="20" required><br><br>

                <label for="stock">Stock:</label>
                <input type="number" name="stock" step="1" max="99999"><br><br>

                <label for="imagen">Imágen:</label>
                <input type="file" name="imagen"><br><br><br>

                <button type="submit" class="button" name="insertProduct"><span>Registrar</span></button>
            </div>
            </form>
        </div>    
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
                        <th>Editar</th>
                        <th>Borrar</th>
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
                                    <a href="formUpdateProduct.php?idProducto=<?php echo $row['idProducto']?>" class="btn btn-primary boton">
                                        <?php print("<img src='images/edit_white.ico' height='26'>"); ?>
                                    </a>
                                </td>
                                <td> 
                                    <a href="deleteProduct.php?idProducto=<?php echo $row['idProducto']?>" class="btn btn-danger" onclick="return confirmDelete()">
                                        <?php print("<img src='images/delete_white.ico' height='26'>"); ?>
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