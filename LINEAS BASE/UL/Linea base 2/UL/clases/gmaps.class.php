<?php
require_once(“conexion.class.php”);
class Gmaps
{
private $dbh;
public function __construct()
{
$this->dbh = Conexion::singleton_conexion();
}
//consulta para buscar por zona
public function dataGmaps($center_lat,$center_lng,$radius)
{
try{
$sql = “SELECT direccion,nombre,lat,lng,descripcion,
(6371 * acos(cos(radians(?)) *
cos(radians(lat)) *
cos(radians(lng) – radians(?)) +
sin(radians(?)) *
sin(radians(lat)))) AS distance
FROM lugares
HAVING distance < ?
ORDER BY distance
LIMIT 0 , 20″;
$query = $this->dbh->prepare($sql);
$query->bindParam(1,$center_lat);
$query->bindParam(2,$center_lng);
$query->bindParam(3,$center_lat);
$query->bindParam(4,$radius);
        $query->execute();
        return $query->fetchAll();
        }catch (PDOException $e) {
            $e->getMessage();
        }
}
//consulta para buscar por zona y tipo comercio
public function dataGmapsComercio($center_lat,$center_lng,$radius,$tipo_comercio)
{
    $tipo_comercio = ‘porcentaje’.$tipo_comercio.’porcentaje’;
try {
//linea tipo comercio
$sql = “SELECT direccion,nombre,lat,lng,descripcion,
(6371 * acos(cos(radians(?)) *
cos(radians(lat)) *
cos(radians(lng) – radians(?)) +
sin(radians(?)) *
sin(radians(lat)))) AS distance
FROM lugares
WHERE tipo_comercio LIKE ?
HAVING distance < ?
ORDER BY distance
LIMIT 0 , 20″;
$query = $this->dbh->prepare($sql);
$query->bindParam(1,$center_lat);
$query->bindParam(2,$center_lng);
$query->bindParam(3,$center_lat);
$query->bindParam(4,$tipo_comercio);
$query->bindParam(5,$radius);
        $query->execute();
        return $query->fetchAll();
    }catch (PDOException $e) {
            $e->getMessage();
        }
}
//función para guardar un nuevo comercio en la base de datos
public function save_store($nombre,$direccion,$lat,$lng,$tipo_comercio,$descripcion)
{
try {
            $sql = “INSERT INTO lugares(nombre,direccion,lat,lng,tipo_comercio,descripcion) VALUES(?,?,?,?,?,?)”;
            $query = $this->dbh->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $direccion);
            $query->bindParam(3, $lat);
            $query->bindParam(4, $lng);
            $query->bindParam(5, $tipo_comercio);
            $query->bindParam(6, $descripcion);
            if($query->execute())
            {
             $this->dbh = null;
             return true;
            }  
        } catch (PDOException $e) {
            $e->getMessage();
        }
}
}