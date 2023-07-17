<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexionBD.php';
$estado = $_POST['estado'];
$id = $_POST['id'];


$result = false;

    $sqlInsertInvernadero = "UPDATE `equipos` SET `Estado_Equipo`='{$estado}' WHERE ID_Equipo=".$id;
    if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
        $result = true;
    } else {
        echo json_encode("error " . $sqlinsertar . $mysqli->error);
    }


$mysqli->close();
echo $result;
?>