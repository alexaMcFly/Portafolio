<?php
    include 'connection.php';
    $sqlIngresos="SELECT sum(importe) AS suma from ingresos";
    $queryIngresos=mysqli_query($connection,$sqlIngresos);
    $rowIngresos=mysqli_fetch_array($queryIngresos,MYSQLI_ASSOC);

    $sqlEgresos="SELECT sum(importe) AS suma from egresos";
    $queryEgresos=mysqli_query($connection,$sqlEgresos);
    $rowEgresos=mysqli_fetch_array($queryEgresos,MYSQLI_ASSOC);

    $base=$rowIngresos['suma']-$rowEgresos['suma'];
    $isr;
    if($base>0){
        if($base<=644.58){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=644.58";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=644.59 && $base<=5470.92){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=5470.92";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=5470.93 && $base<=9614.66){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=9614.66";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=9614.67 && $base<=11176.62){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=11176.62";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=11176.63 && $base<=13381.47){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=13381.47";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=13381.48 && $base<=26988.50){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=26988.50";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=26988.51 && $base<=42537.58){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=42537.58";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=42537.59 && $base<=81211.25){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=81211.25";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=81211.26 && $base<=108281.67){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=108281.67";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        elseif($base>=108281.68 && $base<=324845.01){
            $sqlCuotas="SELECT* FROM cuotas WHERE limSup=324845.01";
            $queryCuotas=mysqli_query($connection,$sqlCuotas);
            $rowCuotas=mysqli_fetch_array($queryCuotas,MYSQLI_ASSOC);
        }
        $isr=(($base-$rowCuotas['limInf'])+($rowCuotas['cuotaFija']))*($rowCuotas['tasa']/100);
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" media="screen">
    <link rel="stylesheet" type="text/css" href="styleAlert.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styleButton.css" media="screen">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script defer src="alert.js"></script>
    <div class="alert hide">
         <span class="fas fa-exclamation-circle"></span>
         <span class="msg">Base negativa: Sin cálculo de ISR!</span>
         <div class="close-btn">
            <span class="fas fa-times"></span>
         </div>
      </div>
    <title>ISR</title>

</head>
<body style="background: #A4E5DE;">
    <div class="logout">
        <button class="button cuatro">
        <div class="icono">
        <img src="https://img.icons8.com/material-rounded/24/000000/chevron-left.png"/>
        </div>
        <a href="logout.php">
        <span>Cerrar Sesión</span>
        </button>
    </div>
    <div class="box isr">
        <div class="izq isr">
            <div class="campos">
                <div class="titulo"><h1>ISR (Enero)</h1></div><br>
                
                <label for="ingresos">Ingreso:</label>
                <input type="textbox" name="ingresos" value="<?php echo $rowIngresos['suma'];?>" readonly="readonly"><br><br>
                <label for="egresos">Egreso:</label>
                <input type="textbox" name="egresos" value="<?php echo $rowEgresos['suma'];?>" readonly="readonly"><br><br>
                <label for="base">Base :</label>
                <input type="textbox" name="base" id="base" value="<?php echo $base;?>" readonly="readonly" >
                <?php
                    if($base>0){
                ?>

                <label for="base"><h4>ISR:</h4></label>
                <input type="textbox" name="isr" value="<?php echo $isr;?>" readonly="readonly" >

                <?php
                    }
                ?>
            </div>
            <div class="contenedor">

            <br><br><button class="boton cinco" onclick="location.href='index.php'">
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