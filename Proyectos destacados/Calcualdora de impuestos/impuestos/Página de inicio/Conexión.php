<?php
    $user="root";
    $pass="";
    $server="localhost";
    $nameBD="inicio_sesion";
    
    $connection=mysqli_connect($server, $user, $pass);//conexión
    if (mysqli_connect_errno()){
        echo "<H3><CENTER> ¡¡¡ FALLO AL CONECTAR CON EL SERVIDOR !!!</CENTER></H3>";//verificación
        exit();
    }
    mysqli_select_db ($connection, $nameBD) or die("<H3><CENTER> ¡¡¡ NO SE ENCUENTRA LA B.D. !!!</CENTER></H3>");
    mysqli_set_charset ($connection, "utf-8"); 
?>