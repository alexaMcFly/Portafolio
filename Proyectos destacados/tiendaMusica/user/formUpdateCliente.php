<?php
    include 'connection.php';
    $idCliente=$_GET['idCliente'];
    $sql="SELECT* FROM cliente WHERE idCliente='$idCliente'";
    $query= mysqli_query($connection,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Actualizar Cliente</title>
</head>
<body><br>
    <script type="text/javascript">

		function confirmUpdate(){
			var respuesta = confirm("¿Realmente desea actualizar esta empresa?");

			if(respuesta == true){
				return true;
			}else{
				return false;
			}
		}
	</script>
    <div class="row"><div class="col-4"></div><div class="col-4"><label class="titulo">Actualizar Cliente</label></div></div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-5">
        
            <form action="updateCliente.php" method="post">

                <input type="hidden" name="idCliente" value="<?php echo $idCliente;?>"><br><br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" maxlength="20" value="<?php echo $row['nombre'];?>"><br><br>

                <label for="apPat">Apellido Paterno:</label>
                <input type="text" name="apPat" maxlength="20" value="<?php echo $row['apPat'];?>"><br><br>

                <label for="apMat">Apellido Materno:</label>
                <input type="text" name="apMat" maxlength="20" value="<?php echo $row['apMat'];?>"><br><br>

                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" maxlength="10" value="<?php echo $row['telefono'];?>"><br><br>

                <label for="correo">Email:</label>
                <input type="email" name="correo" maxlength="40" value="<?php echo $row['correo'];?>"><br><br>

                <label for="estado">Estado:</label>
                <input type="text" name="estado" maxlength="25" value="<?php echo $row['estado'];?>"><br><br>
                
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" maxlength="25" value="<?php echo $row['ciudad'];?>" required><br><br>

                <label for="codPostal">Código Postal:</label>
                <input type="text" name="codPostal" maxlength="5" value="<?php echo $row['codPostal'];?>" required><br><br>
                
                <label for="rfc">RFC:</label>
                <input type="text" name="rfc" maxlength="13" value="<?php echo $row['rfc'];?>"><br><br><br>

                <button type="submit" class="button" name="updateCliente"><span>Guardar</span></button>

            </form>    
        </div>
        <div class="col-6"></div>
    </div>    
</body>
</html>