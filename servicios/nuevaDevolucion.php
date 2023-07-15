<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexionBD.php';

$id_usuario = $_POST['id_usuario'];
$id_equipo = $_POST['id_equipo'];


$resultado = false;
$result = array();
$sqlSolicitud = "SELECT MAX(ID_Solicitud) AS max_id FROM `solicitudes` WHERE ID_Solicitante = `{$id_usuario}` AND ID_Equipo_Solicita = `{$id_equipo}`";
$respuesta = $conection->query($sqlSolicitud);

if ($respuesta->num_rows > 0) {
    while ($fila = $respuesta->fetch_assoc()) {
        $result[] = $fila;
        $idsoli = $fila['max_id'] ?? '';
        echo $idsoli;
        $sqlInsertInvernadero = "INSERT INTO `devoluciones`(`ID_Solicitud_Devolucion`, `Estado_Devolucion`) VALUES ('{$idsoli}','1')";
        if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
            $resultado = true;
        } else {
            echo json_encode("error " . $sqlInsertInvernadero . $mysqli->error);
        }
    }
} else {
    $result = null;
}

$conection->close();
?>
