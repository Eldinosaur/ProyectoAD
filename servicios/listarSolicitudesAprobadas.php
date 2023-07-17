<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once 'conexionBD.php';


$sqlSelect = "SELECT s.*, CONCAT(t.Nombre, ' ', t.Apellido) AS tecnico,
CONCAT(sol.Nombre, ' ', sol.Apellido) AS solicitante,
e.Nombre AS equipo
FROM solicitudes AS s
JOIN usuarios AS t ON t.ID_Usuario = s.ID_Tecnico_Aprueba
JOIN usuarios AS sol ON sol.ID_Usuario = s.ID_Solicitante
JOIN equipos AS e ON e.ID_Equipo = s.ID_Equipo_Solicita
WHERE Estado_Solicitud = 1";
$respuesta = $conection->query($sqlSelect);
$result = array();


if ($respuesta->num_rows > 0) {
    while ($fila = $respuesta->fetch_assoc()) {
        array_push($result, $fila);
    }
} else {
    $result = null;
}

$resultJSON = json_encode($result);
echo $resultJSON;

?>