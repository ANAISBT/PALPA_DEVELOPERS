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

    $query = "INSERT INTO ubicacion VALUES('$Idubicacion','$nombre', '$apellido','$seccion','$descripcion','$latitud','$longitud')";
    mysqli_query($conn,$query);

    echo
    "
    <script>
    alert('Datos agregados exitosamente');
    </script>
    "
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
    <link rel="stylesheet" href="./CSS/main.css" />
    <title>INSERTAR DATOS</title>
</head>
<body class="body" onload = "getLocation();">
<div class="container-fluid">
  <div class="row">
    <div class="col-1">

    </div>
    <div class="Formulario col-10">
    <p class="h1">INSERTAR DATOS</p>
   <form class="myform" action="" method="post" autocomplete="off">
       <input type="hidden" name="Idubicacion" ><br>
       <label for="">Nombre</label>
       <input type="text" name="nombre" requirec value="">
       <br>
       <br>
       <label for="">Apellidos</label>
       <input type="text" name="apellido" requirec value="">
       <br>
       <br>
       <label for="">Seccion</label>
       <input type="text" name="seccion" requirec value="">
       <br>
       <br>
       <label for="">Descripcion</label>
       <input type="text" name="descripcion" requirec value="">
       <br>
       <br>
       <label for="">Latitud</label>
       <input type="text" name="latitud" requirec value="">
       <br>
       <br>
       <label for="">Longitud</label>
       <input type="text" name="longitud" requirec value="">
       <br>
       <br>
       <center>
       <button type="submit" name="submit">AGREGAR</button></center>
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
    <br>
    <div class="linkPrincipal">
    <a href="index.php">Pagina Principal</a></div>
    </div>
    <div class="col-1">
    </div>
  </div>
</div>
</body>
</html>