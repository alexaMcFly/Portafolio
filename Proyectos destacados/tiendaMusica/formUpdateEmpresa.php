<?php
    include 'connection.php';
    $nif_empresa=$_GET['nif_empresa'];
    $sql="SELECT* FROM empresa WHERE nif_empresa='$nif_empresa'";
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
    <title>Actualizar Empresa</title>
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
    <div class="row"><div class="col-4"></div><div class="col-4"><label class="titulo">Actualizar Empresa</label></div></div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-5">
        
            <form action="updateEmpresa.php" method="post">

                <input type="hidden" name="nif_empresa" value="<?php echo $nif_empresa;?>"><br><br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" maxlength="35" value="<?php echo $row['nombre'];?>"><br><br>

                <label for="correo">Email:</label>
                <input type="text" name="correo" maxlength="40" value="<?php echo $row['correo'];?>"><br><br><br>

                <button type="submit" class="button" name="updateEmpresa"><span>Guardar</span></button>

            </form>    
        </div>
        <div class="col-6"></div>
    </div>    
</body>
</html>