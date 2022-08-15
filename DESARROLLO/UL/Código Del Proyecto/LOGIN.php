<?php
include 'db.php';

 session_start();
 error_reporting(0);

if(isset($_SESSION['username'])){
   header("Location:index.php");
}

if(isset($_POST['submit'])){
    $user=$_POST['username'];
    $contra=md5($_POST['password']);

    $sql="SELECT * FROM usuarioslogin WHERE usuario='$user' AND contraseña='$contra'";
    $resultado= mysqli_query($conn, $sql);
    if($resultado->num_rows>0){
        $row=mysqli_fetch_assoc($resultado);
        $_SESSION['username']=$row['usuario'];
        header("Location: index.php");
    }else{
        echo "<script>alert('El  usuario o contraseña es incorrecto. ')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/login.css" />
    <title>LOGIN FORM</title>
    <link rel="icon" href="./images/2344031.png">
</head>
<body style="background: url('./images/header-cementerio.jpg') no-repeat; background-size:cover;">
    <div class="container-fluid">
    <form action="" method="POST" class="login-email">
        <p class="login-text" style="font-size: 2rem; font-weight: 800">ACCEDER</p>
        
        <div class="input-group mb-3">
            <label for="exampleInputUser" class="form-label">NOMBRE DE USUARIO</label>
            <input name="username" type="text" class="form-control" id="exampleInputUser" placeholder="Nombre de Usuario" required>
        </div>

        <div class="input-group mb-3">
            <label for="exampleInputPassword1" class="form-label">CONTRASEÑA</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" required>
        </div>

        <div class="input-group mb-3">
        <button name="submit" type="submit" class="btn btn-primary">Acceder</button>
        </div>
        <br>
        <p class="login-register-text">No tienes una cuenta?<a href="Register.php">Registrate aqui</a></p>
    </form>
    </div>
</body>
</html>