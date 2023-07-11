<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexionBD.php';
$estado = $_POST['estado'];
$recibe = $_POST['$recibe'];
$estado_equipo = $_POST['estado_equipo'];
$observacion = $_POST['observacion'];
$id = $_POST['id'];


$result = false;

    $sqlInsertInvernadero = "UPDATE `devoluciones` SET `ID_Tecnico_Recibe`='{$recibe}',`Estado_Devolucion`='{$estado}',`Estado_Equipo_Devuelve`='{$estado_equipo}',`Observacion_Devolucion`='{observacion}' WHERE ID_Devolucion =".$id;
    if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
        $result = true;
    } else {
        echo json_encode("error " . $sqlinsertar . $mysqli->error);
    }


$mysqli->close();
echo $result;
?>