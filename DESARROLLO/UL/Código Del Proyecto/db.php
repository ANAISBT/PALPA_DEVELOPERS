<?php
$servername="localhost";//sql210.epizy.com
$username="root";//epiz_32292405
$password="";//VuchNoqt1v0QQ
$dbname="ukulocation";//epiz_32292405_ukulocation

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
    
}else{
	
}

?>