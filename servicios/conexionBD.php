<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "prestamosequipos"; 

$conection = mysqli_connect($servername, $username, $password, $dbname);
$mysqli = new mysqli($servername, $username, $password, $dbname); 

if(!$mysqli)
{ 
    die("Error en la conexion consulte al administrador".mysqli_connect_error());
}

?>