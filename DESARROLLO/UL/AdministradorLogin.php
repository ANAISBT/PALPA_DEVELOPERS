<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/main.css" />
    <title>ADMIN SEGURIDAD</title>
</head>
<body class="body" onload = "getLocation();">
<div class="container-fluid">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="Formulario col-10">
    <h1 class="h1">Sistema de Validación</h1>
   <form class="myform" action="validarAdmin.php" method="post" autocomplete="off">
   <label for="">USUARIO</label><input type="text" placeholder="Ingrese su nombre de Usuario" name="usuario">
   <br>
   <br>
   <label for="">CONTRASEÑA</label><input type="password" placeholder="Ingrese su Contraseña" name="contraseña">
   <br>
   <br>
        <center><input type="submit" value="Ingresar"></center>
    </form> 
    </div>
    <div class="col-1">
    </div>
  </div>
</div>
</body>
</html>

