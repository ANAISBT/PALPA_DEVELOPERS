<?php
include 'db.php';

session_start();
error_reporting(0);

// if(isset($_SESSION['username'])){
//     header('Location:LOGIN.php');
//   }

if(isset($_POST['submit'])){
    $user=$_POST['username'];
    $contra=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);

    if($contra == $cpassword){
        $sql = "SELECT * FROM usuarioslogin WHERE usuario='$user'";
        $resultado= mysqli_query($conn, $sql);
        if(!$resultado->num_rows>0){
            $sql = "INSERT INTO usuarioslogin (usuario, contraseña)
            VALUES ('$user','$contra')";
        $resultado= mysqli_query($conn, $sql);
        if($resultado)  {
            echo "<script> alert('Woooooo Registrado Correctamente')</script>";
            $user="";
            $_POST['password']="";
            $_POST['cpassword']="";
        }else{
            echo "<script> alert('Woops! Algo salió mal')</script>";
        }
        }else{
            echo "<script>alert('Nombre de usuario ya existe. ')</script>";
        } 
    }else{
        echo "<script>alert('Contraseña no es igual.')</script>";
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
    <title>REGISTER FORM</title>
    <link rel="icon" href="./images/2344031.png">
</head>
<body style="background: url('./images/header-cementerio.jpg') no-repeat; background-size:cover;">
    <div class="container-fluid">
    <form action="" method="post" class="login-email">
        <p class="login-text" style="font-size: 2rem; font-weight: 800">REGISTRAR</p>
        <div class="input-group mb-3">
            <label for="exampleInputUser" class="form-label">NOMBRE DE USUARIO</label>
            <input name="username" type="text" class="form-control" id="exampleInputUser" placeholder="Nombre de Usuario" required >
        </div>
        <div class="input-group mb-3">
            <label for="exampleInputPassword1" class="form-label">CONTRASEÑA</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña"  required>
        </div>
        <div class="input-group mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirmar CONTRASEÑA</label>
            <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirmar Contraseña" required>
        </div>
        <div class="input-group mb-3">
        <button name="submit" type="submit" class="btn btn-primary">Registrar</button>
</div>
<br>
<p class="login-register-text">Tienes una cuenta?<a href="LOGIN.php">Acceder aqui</a></p>
</form>
    </div>
</body>
</html>