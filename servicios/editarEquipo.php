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
$id = $_POST['id'];


$result = false;

    $sqlInsertInvernadero = "UPDATE `equipos` SET `Nombre`='{$nombre}',`Marca`='{$marca}',`Detalle`='{$detalle}',`Precio_Adquisicion`='{$precio}',`Estado_Equipo`='{$estado}',`url_imagen`='{$url}',`Codigo_Equipo`='{$codigo}' WHERE ID_Equipo=".$id;
    if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
        $result = true;
    } else {
        echo json_encode("error " . $sqlinsertar . $mysqli->error);
    }


$mysqli->close();
echo $result;
?>