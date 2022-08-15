<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/login.css"/>
    <title>ADMIN SEGURIDAD</title>
    <link rel="icon" href="./images/2344031.png">
</head>
<body style="background: url('./images/header-cementerio.jpg') no-repeat; background-size:cover;";class="body" onload = "getLocation();">
<div class="container-fluid">
   <form class=" login-email myform" action="validarAdmin.php" method="post" autocomplete="off">
   <p class="login-text" style="font-size: 2rem; font-weight: 800">Sistema de Validación</p>
   <div class="input-group mb-3">
   <label for="exampleInputUser" class="form-label">USUARIO</label>
   <input type="text" placeholder="Ingrese su nombre de Usuario" name="usuario" class="form-control" id="exampleInputUser" required>
  </div>
  <div class="input-group mb-3">
   <label for="exampleInputPassword1" class="form-label">CONTRASEÑA</label>
   <input type="password" placeholder="Ingrese su Contraseña" name="contraseña" class="form-control" id="exampleInputPassword1" required>
</div>
<div class="input-group mb-3">
        <button name="submit" type="submit" value="Ingresar" class="btn btn-primary">Ingresar</button>
</div>
    </form> 
</div>
</body>
</html>

