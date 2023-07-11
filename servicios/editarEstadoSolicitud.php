<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexionBD.php';
$estado = $_POST['estado'];
$id_aprueba = $_POST['$id_aprueba'];
$observacion = $_POST['observacion'];
$id = $_POST['id'];


$result = false;

    $sqlInsertInvernadero = "UPDATE `solicitudes` SET `ID_Tecnico_Aprueba`='{$id_aprueba}',`Estado_Solicitud`='{$estado}',`Observacion_Solicitud`='{$observacion}' WHERE ID_Solicitud =".$id;
    if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
        $result = true;
    } else {
        echo json_encode("error " . $sqlinsertar . $mysqli->error);
    }


$mysqli->close();
echo $result;
?>