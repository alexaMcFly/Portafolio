<?php 
include("conexion.php");

$con=conectar();
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$mensaje=$_POST['mensaje'];

$sql="INSERT INTO mensaje VALUES('$nombre','$email','$telefono','$mensaje')";
$query= mysqli_query($con,$sql);

if($query) {
	echo '<script type="text/javascript">alert("Mensaje enviado con éxito!!");window.location.href="Inicio.html";</script>';
}
?>