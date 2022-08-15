<?php
require("db.php");

if(isset($_POST["submit"])){
    $Idubicacion=$_POST["Idubicacion"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $seccion=$_POST["seccion"];
    $descripcion=$_POST["descripcion"];
    $latitud=$_POST["latitud"];
    $longitud=$_POST["longitud"];
    $Imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

    $query = "INSERT INTO ubicacion(Idubicacion,nombre,apellido,seccion,descripcion,lat,lng,Imagen_principal) VALUES('$Idubicacion','$nombre', '$apellido','$seccion','$descripcion','$latitud','$longitud','$Imagen')";
    $resultado=mysqli_query($conn,$query);
    if($resultado)  {
        echo "<script> alert('Woooooo Datos Ingresados Correctamente')</script>";
     }else{
        echo "<script> alert('Woops! Algo salió mal')</script>";
    }
    ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/login.css" />
    <title>INSERTAR DATOS</title>
    <link rel="icon" href="./images/2344031.png">
</head>
<body style="background: url('./images/header-cementerio.jpg') no-repeat; background-size:cover;";class="body" onload = "getLocation(); ">
<div class="container-fluid">
   <form action="" method="POST" class="myForm login-email" autocomplete="off" enctype="multipart/form-data">
   <p class="login-text" style="font-size: 2rem; font-weight: 800">INSERTAR DATOS</p>
        <input type="hidden" name="Idubicacion" ><br>
        <div class="input-group mb-3">
       <label for="exampleInputUser" class="form-label">Nombre</label>
       <input class="form-control" id="exampleInputUser" type="text" name="nombre" requirec value="">
       </div>
        <div class="input-group mb-3">
       <label for="exampleInputUser" class="form-label">Apellidos</label>
       <input class="form-control" id="exampleInputUser" type="text" name="apellido" requirec value="">
       </div>
       <div class="input-group mb-3">
       <label for="exampleInputUser" class="form-label">Seccion</label>
       <input class="form-control" id="exampleInputUser" type="text" name="seccion" requirec value="">
        </div>
        <div class="input-group mb-3">
       <label for="exampleInputUser" class="form-label">Fecha de defunción</label>
       <input class="form-control" id="exampleInputUser" type="text" name="descripcion" requirec value="">
        </div>
        <div class="input-group mb-3">
       <label for="exampleInputUser" class="form-label">Latitud</label>
       <input class="form-control" id="exampleInputUser" type="text" name="latitud" requirec value="">
        </div>
       <div class="input-group mb-3">
       <label for="exampleInputUser" class="form-label">Longitud</label>
       <input class="form-control" id="exampleInputUser" type="text" name="longitud" requirec value="">
        </div>
        <div class="input-group mb-3">
       <label for="exampleInput" class="form-label">Imagen</label>
       <input class="form-control" id="exampleInput" type="file" name="Imagen" requirec value="">
        </div>
       <div class="input-group mb-3">
       <button class="btn" type="submit" name="submit">AGREGAR</button>
        </div>
    </form> 
    <script type="text/javascript">
        function getLocation(){
            if(navigator.getLocation){
                navigator.getLocation.getCurrentPosition(showPosition,showError);
            }
        }
        function showPosition(position){
            document.querySelector('.myForm input[name="latitud"]').value=position.coords.latitud;
            document.querySelector('.myForm input[name="longitud"]').value=position.coords.longitud;
        }
        function showError(error){
            switch(error.code){
                case error.PERMISSION_DENIED:
                    alert("Debes de permitir que se llene la solicitud de geolocalización en el formulario");
                    location.reload();
                    break;
            }
        }
    </script>

    <div class="linkPrincipal">
    <a href="index.php">Pagina Principal</a></div>
    </div>
</div>
</body>
</html>