<?php
    include 'connection.php';
    $id=$_GET['id'];
    $sql="SELECT* FROM clientes WHERE rfc='$id'";
    $query= mysqli_query($connection,$sql);
    $row=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Actualizar cliente</title>
</head>
<body style="backgound=#C4EAE4">
    
<div class="titulo"><br><center><b><h1>Actualización de Clientes</h1></b></center><br></div>
<hr width="100%">
        <form action="updateCliente.php" method="POST">
            <div class="row"><div class="col-2"></div>
                <div class="col-4">
                    <input type="hidden" name="rfc" value="<?php echo $row['rfc']?>">
                    <label for="nombre "><b>Nombre:</b></label>
                    <input type="text" name="nombre" placeholder="nombre del cliente" value="<?php echo $row['Nombre']?>" class="form-control my-2" require>
                </div>
                <div class="col-1"></div>
                <div class="col-2">
                <br><br><br><br><button type="submit" name="botonAct" onclick="return updateConfirm()" class="btn-lg btn-primary" value="Actualizar">Actualizar</br>
                </div>
                <div class="col-1"></div>
            </div>  
    
        </form>

        <script type="text/javascript">
            function updateConfirm(){
                var res = confirm("¿Desea actualizar este cliente?");

                if(res == true){
                    return true;
                }else{
                    return false;
                }
		    }
        </script>
</body>
</html>