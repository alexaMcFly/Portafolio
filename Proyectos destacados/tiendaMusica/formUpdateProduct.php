<?php
    include 'connection.php';
    $idProducto=$_GET['idProducto'];
    $sql1="SELECT* FROM producto WHERE idProducto='$idProducto'";
    $query1= mysqli_query($connection,$sql1);
    $row=mysqli_fetch_array($query1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Actualizar Producto</title>
</head>
<body><br>
    <script type="text/javascript">

		function confirmUpdate(){
			var respuesta = confirm("¿Realmente desea actualizar este producto?");

			if(respuesta == true){
				return true;
			}else{
				return false;
			}
		}
	</script>
    <div class="row"><div class="col-4"></div><div class="col-4"><label class="titulo">Actualizar Producto</label></div></div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
        
            <form action="updateProduct.php" method="post" enctype="multipart/form-data">
            <div class="col-2"></div>
            <div class="col-5">

                <input type="hidden" name="idProducto" value="<?php echo $row['idProducto'];?>"><br><br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" maxlength="35" value="<?php echo $row['nombre'];?>"><br><br>

                <label for="nif_empresa">Empresa:</label>
                <select name="nif_empresa">
                    <?php
                        $nif_empresa=$row['nif_empresa'];
                        $sql2="SELECT nombre FROM empresa WHERE nif_empresa='$nif_empresa'";
                        $query2=mysqli_query($connection,$sql2);
                        $row2 = mysqli_fetch_array($query2);
                        $nombre=$row2['nombre'];
                    ?>
                    
                    <option value="<?php echo $nif_empresa;?>"><?php echo $nombre;?></option>
                    <?php
                        $sql3="SELECT* FROM empresa WHERE nif_empresa !='$nif_empresa'";
                        $query3=mysqli_query($connection,$sql3);                    
                        foreach($query3 as $options){?>
                            <option value="<?php echo $options['nif_empresa'];?>"><?php echo $options['nombre'];?></option>
                    <?php
                        }
                    ?>
                </select>
                    
                    <br><br>

                <label for="precio">Precio:</label>
                <input type="number" name="precio" max="9999999.99" value="<?php echo $row['precio'];?>"><br><br>
                
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" maxlength="40" value="<?php echo $row['modelo'];?>" required><br><br>

                <label for="marca">Marca:</label>
                <input type="text" name="marca" maxlength="20" value="<?php echo $row['marca'];?>" required><br><br>

                <label for="stock">Stock:</label>
                <input type="number" name="stock" step="1" max="99999" value="<?php echo $row['stock'];?>"><br><br>

                <label for="imagen">Imágen:</label>
                <div class="img"><img src="<?php echo $row['imagen'];?>" width="200px"></div><br>
                <input type="file" name="imagen"><br><br>

                <button type="submit" class="button" name="updateProduct"><span>Guardar</span></button>
            </div>
            </form>    
        </div>
    </div>    
</body>
</html>