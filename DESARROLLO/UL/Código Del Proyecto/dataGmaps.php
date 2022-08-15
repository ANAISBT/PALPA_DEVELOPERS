<?php
//comprobamos que sea una petición ajax
if(!empty($_SERVER[‘HTTP_X_REQUESTED_WITH’]) && strtolower($_SERVER[‘HTTP_X_REQUESTED_WITH’]) == ‘xmlhttprequest’)
{
require_once(“clases/gmaps.class.php”);
$gmaps = new Gmaps();
//obtenemos las variables que llegar por get
$center_lat = $_GET[“lat”];
$center_lng = $_GET[“lng”];
$radius = $_GET[“radius”];
//si nos piden por un tipo de comercio pedimos datos al método dataGmapsComercio
//en otro caso al método dataGmaps
if(isset($_GET[“tipo_comercio”]))
{
$tipo_comercio = $_GET[“tipo_comercio”];
$resultado = $gmaps->dataGmapsComercio($center_lat,$center_lng,$radius,$tipo_comercio);
}else{
$resultado = $gmaps->dataGmaps($center_lat,$center_lng,$radius);
}
//colocamos un encabezado tipo xml para googlemaps
header(“Content-type: text/xml”);
//Iniciamos el archivo XML, creamos el nodo padre que será markers
$dom = new DOMDocument(“1.0”);
$node = $dom->createElement(“markers”);
$parnode = $dom->appendChild($node);
//recorremos el resultado para devolver el xml añadiendo los nodos que queramos
foreach ($resultado as $row)
{
  $node = $dom->createElement(“marker”);
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute(“name”, $row[‘nombre’]);
  $newnode->setAttribute(“address”, $row[‘direccion’]);
  $newnode->setAttribute(“lat”, $row[‘lat’]);
  $newnode->setAttribute(“lng”, $row[‘lng’]);
  $newnode->setAttribute(“distance”, $row[‘distance’]);
  $newnode->setAttribute(“descripcion”, $row[‘descripcion’]);
}
//imprimimos el xml para que google maps pueda buscar
echo $dom->saveXML();
}else{
throw new Exception(“Error Processing Request”, 1);
}