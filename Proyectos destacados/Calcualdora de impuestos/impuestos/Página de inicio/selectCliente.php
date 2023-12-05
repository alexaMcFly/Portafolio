<?php
    include('connection.php');
    $busqueda=strtolower($_POST['buscar']);
    if(empty($busqueda)){
        header("Location: contacto.php");
    }

    $sql="SELECT* FROM clientes WHERE rfc LIKE '%$busqueda%' OR Nombre LIKE '%$busqueda%'";
    $query= mysqli_query($connection, $sql);
    $total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleCliente.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styleButton.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Resultados de búsqueda</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark mynav">      
        <button type="button" onclick="location.href='index.php'" class="btn btn-lg btn-outline-info" style="margin:10px; margin-left: 50px; margin-right: 50px;">Inicio</button>
        <ul class="navbar-nav  me-auto mb-2 mb-lg-0">

            <li class="nav-item active">
                <a href="cliente.php" class="nav-link btn-lg nav-separacion active">Clientes</a>
            </li>
        </ul>
        <form action="selectCliente.php" method="POST" class="d-flex"><!--barra para buscar-->
            <input name="buscar" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-primary" type="submit"><img src="img/search_30px.png"></button>
        </form>
        <input type="submit" class="btn btn-outline-info" style="margin:10px; margin-left: 30px; margin-right: 30px;" value="Cerrar Sesión">
    </nav>
    <?php
        if ($total==0){
    ?>
        <br><center><p class="lead subtitulo"><h1 style="color: rgb(196, 27, 21); "><b>No se encontraron resultados similares</b></h1></p></center>
    <?php    
        }
        else{
    ?>
    <br><center><p class="lead subtitulo"><h1 style="color: black; "><b> Resultados de búsqueda</b></h1></p></center>
    <div class="tabla">
    <table class="table  table-hover table-info table-bordered" name="tabla"><!--Tabla en la que se colocarán los datos agregados-->
            <thead class="table-dark">
                <tr>
                    <th><center>RFC</center></th>
                    <th><center>nombre</center></th>
                    <th><center></center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                ?>
                    <tr>
                        <th> <?php echo $row['rfc']?></th>
                        <th> <?php echo $row['Nombre']?></th>
            
                        <th><a href="formUpdateCliente.php?id=<?php echo $row['rfc'] ?>" class="btn btn-primary">Editar</a></th>
                    </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        </div>
</body>
</html>