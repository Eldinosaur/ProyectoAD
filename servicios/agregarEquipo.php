<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexionBD.php';
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$detalle = $_POST['detalle'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];
$url = $_POST['url'];
$codigo = $_POST['codigo'];


$result = false;

    $sqlInsertInvernadero = "INSERT INTO `equipos`(`Nombre`, `Marca`, `Detalle`, `Precio_Adquisicion`, `Estado_Equipo`, `url_imagen`, `Codigo_Equipo`) VALUES ('".$nombre."','".$marca."','".$detalle."','".$precio."','".$estado."','".$url."','".$codigo."')";
    if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
        $result = true;
    } else {
        echo json_encode("error " . $sqlinsertar . $mysqli->error);
    }


$mysqli->close();
echo $result;
?>