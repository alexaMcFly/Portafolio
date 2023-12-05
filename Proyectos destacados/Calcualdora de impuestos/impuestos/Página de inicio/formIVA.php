<?php
    include 'connection.php';
    $sqlTras="SELECT sum(iva) AS suma from ingresos";//cálculo de iva trasladado
    $queryTras=mysqli_query($connection,$sqlTras);
    $rowTras=mysqli_fetch_array($queryTras,MYSQLI_ASSOC);

    $sqlAcred="SELECT sum(iva) AS suma from egresos";//cálculo de iva acreditable
    $queryAcred=mysqli_query($connection,$sqlAcred);
    $rowAcred=mysqli_fetch_array($queryAcred,MYSQLI_ASSOC);

    $iva=$rowTras['suma']-$rowAcred['suma'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css" media="screen">
    <link rel="stylesheet" type="text/css" href="styleButton.css" media="screen">
    <link rel="stylesheet" type="text/css" href="styleAlert.css" media="screen">
    <title>IVA</title>
</head>
<body style="background: #C588B4;">
    <div class="logout">
        <button class="button cuatro">
        <div class="icono">
        <img src="https://img.icons8.com/material-rounded/24/000000/chevron-left.png"/>
        </div>
        <a href="logout.php">
        <span>Cerrar Sesión</span>
    </a>
        </button>
    </div>

    <div class="box iva">
        <div class="izq">
            <div class="campos iva">
                <div class="titulo"><h1>IVA (Enero)</h1></div><br>
               
                <label for="trasladado">IVA Trasladado:</label>
                <input type="textbox" name="trasladado" value="<?php echo $rowTras['suma'];?>" readonly="readonly"><br><br>
                <label for="acreditable">IVA Acreditable:</label>
                <input type="textbox" name="acreditable" value="<?php echo $rowAcred['suma'];?>" readonly="readonly"><br><br>
                <?php
                    if($iva>0){
                ?>
                    <label><b>Pago:</b></label>
                <?php
                    }
                    elseif($iva<0){
                ?>
                    <label><b>Cobro:</b></label>
                <?php
                    }
                ?>
                <input type="textbox" name="iva" value="<?php echo $iva;?>" readonly="readonly">

            </div>
            
            <div class="contenedor">

            <br><br><br><br><button class="boton cinco" onclick="location.href='index.php'">
                    <div class="icono">
                    <img src="https://img.icons8.com/material-rounded/24/000000/chevron-left.png"/>
                    </div>
                    <span>Regresar</span>
                    </button>
            </div>
        </div>
    </div>

</body>
</html>