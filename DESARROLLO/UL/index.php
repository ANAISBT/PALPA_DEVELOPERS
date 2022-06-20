
<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script
      src="https://kit.fontawesome.com/e9c9a86b22.js"
      crossorigin="anonymous"
    ></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/style.css" />
    <title>UKU LOCATION</title>
    <link rel="icon" href="./images/2344031.png">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        	<style>
            .map-container-2 {
              overflow: hidden;
              padding-bottom: 56.25%;
              position: relative;
              height: 0;
            }
        
            .map-container-2 iframe {
              left: 0;
              top: 0;
              height: 100%;
              width: 100%;
              position: absolute;
            }

            .EnlaceAdmi{
              display:flex;
              align-items: center;
            }
            .Caracteristicas{
              background-color:#ff556e;
              border-radius:20px;
              width: 35%;
              display:flex;
              flex-direction:column;
              align-items: center;
            }
            .item{
              font-size:15px;
              color:white;
              font-weight:bold;
              margin:0px !important;
            }
            .item h4{
              font-size:17px;
              color:white;
              margin:10px 0;
            }
          </style>
  </head>
  <body>
    <header class="header">
    <div class=" EnlaceAdmi container">
        <a class="logo-image"><img src="./images/Logo.png" alt="alternative" width="170px" height="70px"></a> 
        <form action="EnviarAdmi.php" method="post"><input type="submit" value="Administrador"></form>
      </div> 
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="image-container">
                  <center>
                    <img class="img-fluid" src="./images/header-cementerio.jpg" alt="alternative">
                  </center>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </header>
    

      
    </div> 
    <main class="main">
                   <h1 class="Nombre">UKU LOCATION</h1>
                    <p class="p">¡ADELANTE!<br>Encuentra a tu ser querido</p>
                    <center>
                    <form action=""  method="get" enctype="multipart/form-data">
                      <input  type="text" placeholder="Nombre" name="nombre" required><br>
                      <input class="btn-solid-lg" type="submit" name="enviar" onclick="buscaLocalizacion()" value="Buscar">
                    </form>
                  </center>
                    <br>
                    <?php
                   require("db.php");
                        if(isset($_GET['enviar'])){
                        $nombre = $_GET['nombre'];

                        $consulta = $conn->query("SELECT * FROM ubicacion WHERE nombre LIKE '%$nombre%'");
                        
                        while ($row = $consulta->fetch_array()){
                          ?>
                          <nav class="Resultado" style="with:500px;height:300px;display:flex;flex-position:column;flex-wrap: wrap;justify-content: space-around;align-content: space-around">
                            <nav class="Caracteristicas">
                                <nav class="item" style=" padding: 10px">
                                  <h4>Nombre:</h4>
                                  <?php echo $row['nombre']?>
                                </nav>
                                <nav class="item" style=" padding: 10px">
                                  <h4>Apellido:</h4>
                                  <?php echo $row['apellido']?>
                                </nav>
                                <nav class="item" style=" padding: 10px">
                                  <h4>Seccion:</h4>
                                  <?php echo $row['seccion']?>
                                </nav>
                                <nav class="item" style=" padding: 10px">
                                  <h4>Descripción:</h4>
                                  <?php echo $row['descripcion']?>
                                </nav>
                            </nav>
                            <nav>
                              <iframe src='https://www.google.com/maps?q=<?php echo $row["lat"]; ?><?php echo $row["lng"]; ?>&hl=es;z=14&output=embed' style="width: 400px; height: 300px;" >
                            </nav>
                          </nav>    
                        <?php 
	                      }
	                      }
	                      ?>
           
    </main>
    <br>
  <br>
    <div class="container">

      <div class="row">
        <div class="col-md-8">
          <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 600px; width:100%;">
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
                  center: new google.maps.LatLng(-12.008052, -76.93811),
                  zoom: 16,
              heading: 90,
              tilt: 45
              });
      
      
              var infoWindow = new google.maps.InfoWindow;
              downloadUrl('http://localhost/ukulocation_11/xml.php', function(data) {
                  var xml = data.responseXML;
                  var markers = xml.documentElement.getElementsByTagName('marker');
                  Array.prototype.forEach.call(markers, function(markerElem) {
                      var Idubicacion = markerElem.getAttribute('Idubicacion');
                      var seccion = markerElem.getAttribute('seccion');
                      var descripcion = markerElem.getAttribute('descripcion');
                     
                      var point = new google.maps.LatLng(
                          parseFloat(markerElem.getAttribute('lat')),
                          parseFloat(markerElem.getAttribute('lng')));
                      const contentString =
                          '<div id="content">' +
                          '<div id="siteNotice">' +
                          "</div>" +
                          '<center>'+
                          '<h1 id="firstHeading" class="firstHeading">'+ seccion +  '</h1>' +
                          '</center>'+
                          '<br>'+
                          '<div id="bodyContent">' +
                          '<br>'+
                          "<p><b>" + descripcion + "</p>" +
                          "</p>" +
                          "</div>" +
                          "</div>";
      
      
                      //const image = "img/soldadoss.png";
                      //  var icon = customLabel[codigo] || {};
      
               
      
                      var marker = new google.maps.Marker({
                          map: map,
                          position: point,
                          //icon: image
                      });
                      marker.addListener('click', function() {
                          infoWindow.setContent(contentString);
                          infoWindow.open(map, marker);
                      });
                  });
              });
      
              // Una matriz con las coordenadas de los límites de Bucaramanga, extraídas manualmente de la base de datos GADM
      
             
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
