<?php

 session_start();

  if(!isset($_SESSION['username'])){
  header('Location:LOGIN.php');
  };
?>

<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script
      src="https://kit.fontawesome.com/e9c9a86b22.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+QLD+Beginner:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UKU LOCATION</title>
    <link rel="icon" href="./images/2344031.png">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style>
            body {
                padding-bottom: 20px;
                background-color:#EFF7F6;
            }
        </style>
        	<style>
            .logo-image{
              vertical-align: middle;
              border-style: none;
            }
            .img-fluid{
              width: 800px;
            }
            
            .navbar ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #00C49A;
                margin-bottom:10px;
            }

            .navbar li {
                float: left;
            }

            .navbar li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .navbar li a:hover {
                background-color: #111;
            }

            .EnlaceAdmi{
              display:flex;
              align-items: center;
              justify-content: space-between;
              margin: 0px 30px;
            }
            .card-img{
              border-color:#80CDDB;
              border-width:2px;
              width:95%;
            }
            .inputNombre {
              border-radius:21px;
              height:25px;
              width:20%;
              text-align: -webkit-match-parent;
              padding: 7px;
            }

            .inputApellido{
              border-radius:21px;
              height:25px;
              width:20%;
              text-align: -webkit-match-parent;
              padding: 7px;
            }

            .linea{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .Nombre{
              text-align: center;
              display: block;
              margin-block-start: 0.67em;
              margin-block-end: 0.37em;
              margin-inline-start: 0px;
              margin-inline-end: 0px;
              color: black;
              font-size:2.625rem;
              font-weight:700;
            }
            .p{
              display: block;
                margin-block-start: 0.5em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                text-align: center;
                color: rgb(84, 81, 81);
                font-size:1.375rem;
                font-weight:400;
            }
            .GenerarBusqueda {
              grid-area: Busqueda;
              display: flex;
              margin: 1.5rem;
              flex-wrap: wrap;
              justify-content: space-around;
            }
            .BotonBusqueda{
              display: flex;
              flex-direction: column;
              align-items: center;
            }
            .Fallecido{
              font-size:1.2rem;
                font-weight:bold;
                margin-bottom: 1rem;
            }
            .Busqueda div{
              display: block;
              margin-left: 3rem;
              box-sizing: border-box;
              text-align: center;
              color: rgb(84, 81, 81);
              font-size:2.375rem;
              font-weight:400;
            }
            .btn-solid-lg {
              margin-right: 0.5rem;
              display: inline-block;
                padding: 1rem 3.375rem 1rem 3.375rem;
                border: 0.125rem solid #00C49A; 
                border-radius: 2rem;
                background-color: #00C49A; 
                color: #fff;
                font-size:0.875rem;
                font-weight:700;
                text-decoration: none;
                transition: all 0.2s;
                cursor: pointer;
            }
            .map-container-2 {
              overflow: hidden;
              padding-bottom: 56.25%;
              position: relative;
              height: 0;
            }
            .map-container-2 iframe {
              left: 0;
              top: 0;
              position: absolute;
            }
            .Caracteristicas{
              border-radius:20px;
              width: 45%;
              display:flex;
              flex-direction:column;
              align-items: center;
              }
              .Caracteristicas img{
                margin-top:20px;
              }
              .Resultado{
                display:flex;
                flex-direction:row;
                background-color:#A7DCCC;
                flex-wrap: wrap;
                justify-content: space-around;
                align-content: space-around;
                padding-top: 20px;
                padding-bottom: 20px;
              }

            .Inicio p{
              font-size:30px;
              font-weight: bold;
              margin-left: 14px;
            }
            .Inicio{
              display:flex;
              align-items: center;
            }
            .item{
              font-size:15px;
              color:white;
              font-weight:bold;
              margin:0px !important;
            }
            .card {
              display:flex;
              justify-content: center;
            }
            .table{
              margin-top:20px;
              
            }
            .table-group-divider td{
              padding:15px;
              padding-right:17px;
            }
            .imgmap{
              width: 500px;
              height: 500px;
            }

            .map-container{
              height: 600px;
            }
          </style>
  </head>
  <body>
    <header class="header">
    <div class=" EnlaceAdmi container">
      <div class="Inicio">
        <div>
        <a href="./index.php" class="logo-image"><img src="./images/uku.png" alt="alternative" width="50px" height="50px"></a>
        </div>
        <div><p>UKU LOCATION</p></div> 
      </div>
      <div class="navbar"> 
      <ul>
        <li><a href="./AdministradorLogin.php">Administrador</a></li>
        <li><a href="./Contacto.php">Contactenos</a></li>
      </ul>
      </div> 
      </div> 
      </header>
      <div class="card bg-dark text-white">
        <img src="./images/Img-proposito-web.jpg" class="card-img" alt="...">
      </div>
    

      
    </div> 
    <main class="main">
                   <h1 class="Nombre">UKU LOCATION</h1>
                    <p class="p">¡ADELANTE!<br>Encuentra a tu ser querido</p>
                    <form action=""  method="get" enctype="multipart/form-data">
                        <div class="linea">
                            <input class="inputNombre" type="text" placeholder="Nombre" name="nombre" required><br>
                            <input class="inputApellido" type="text" placeholder="Apellidos" name="apellido" required><br>
                            <h5>*Los Nombres y Apellidos tienen que ser de la misma manera en que lo registraron*</h5>
                            <input class="btn-solid-lg" type="submit" name="enviar" onclick="buscaLocalizacion()" value="Buscar">
                          </div>
                    </form>
                    <br>
                    <?php
                   require("db.php");
                        if(isset($_GET['enviar'])){
                        $nombre = $_GET['nombre'];
                        $apellido=$_GET['apellido'];

                        $consulta = $conn->query("SELECT * FROM ubicacion WHERE nombre LIKE '%$nombre%' and apellido LIKE '%$apellido%'");
                        
                        while ($row = $consulta->fetch_assoc()){
                          ?>
                          <div class="container-fluid">
                          <div class="row">
                          <nav class="Resultado col-mb-12">
                            <nav class="Caracteristicas card mb-5 ">
                                 
                              <img width="500" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen_principal']);?>" class="card-img-top" alt="..." >
                              <div class="card-body">

                              <table class="table --bs-border-width: 2px;">
                              <caption class="Fallecido">DATOS DEL FALLECIDO</caption>
                                <thead class="table-light">
                                  <tr>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">APELLIDO</th>
                                    <th scope="col">SECCIÓN</th>
                                    <th scope="col">FECHA DE DEFUNCIÓN</th>
                                  </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                  <tr>
                                    <td><?php echo $row['nombre']?></td>
                                    <td><?php echo $row['apellido']?></td>
                                    <td><?php echo $row['seccion']?></td>
                                    <td><?php echo $row['descripcion']?></td>
                                  </tr>
                                </tbody>

                              </table>
                            </div>
                            </nav>
                            <nav  class="card mb-7">
                              <iframe class="imgmap" title="map" src='https://www.google.com/maps?q=<?php echo $row["lat"]; ?><?php echo $row["lng"]; ?>&hl=es;z=10&output=embed' >
                            </nav>
                          </nav> 
                          </div>
                          </div>   
                        <?php 
	                      }
	                      }
	                      ?>
           
    </main>
  <br>
    <div class="container">

      <div class="row">
        <div class="col-md-8">
          <div id="map-container-google-2" class="z-depth-1-half map-container">
					</div>
        </div>
         
      </div>

      <hr>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <script>
          var customLabel = {
              restaurant: {
                  label: 'R'
              },
              bar: {
                  label: 'B'
              }
          };
      
          function initMap() {
              var map = new google.maps.Map(document.getElementById('map-container-google-2'), {
                  center: new google.maps.LatLng(-12.008052, -76.93812),
                  zoom: 16.1,
              heading: 90,
              tilt: 45
              });
             
      }
      
          function downloadUrl(url, callback) {
              var request = window.ActiveXObject ?
                  new ActiveXObject('Microsoft.XMLHTTP') :
                  new XMLHttpRequest;
              request.onreadystatechange = function() {
                  if (request.readyState == 4) {
                      request.onreadystatechange = doNothing;
                      callback(request, request.status);
                  }
              };
              request.open('GET', url, true);
              request.send(null);
          }

          function buscaLocalizacion()
{
 var ubicacion = document.getElementById('Iubicacion').value;
 var geocoder = new google.maps.Geocoder();
 geocoder.geocode({ubicacion: ubicacion}, function(results, status)
 {
   if (status == google.maps.GeocoderStatus.OK)
   {
     localizador(results[0].geometry.location);
   } else {
     alert('Su búsqueda no ha podido ser procesada.');
   }
 });
}
      
          function doNothing() {}
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAet6BC3A-TE6toXKEFBxLcFYscszuNKFw&callback=initMap"
              defer>
          </script>
          <footer>
        <p>&copy; Company 2022</p>
      </footer>
  </body>
</html>
