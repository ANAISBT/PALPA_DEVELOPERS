<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conn=mysqli_connect("localhost","root","","ukulocation");

$consulta="SELECT*FROM login where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location: Admin.php");
}else{
    ?>
    <?php 
    include("AdministradorLogin.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTICACIÓN</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conn);
