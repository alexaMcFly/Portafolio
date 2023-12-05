<?php 
include('Conexión.php');
$usuario=$_POST['usuario'];
$password=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","inicio_sesion");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:index.php");

}else{
    ?>
    <?php
    include("inicioSesion.html");

  ?>
  <h1 class="bad">Usuario no registrado</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
