<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once 'conexionBD.php';


$sqlSelect = "SELECT d.*, CONCAT(t.Nombre, ' ', t.Apellido) AS tecnico
FROM devoluciones AS d 
JOIN usuarios AS t ON t.ID_Usuario = d.ID_Tecnico_Recibe
WHERE Estado_Devolucion = 2";
$respuesta = $conection -> query ($sqlSelect);
$result = array ();


if ( $respuesta -> num_rows > 0 ){
    while ( $fila = $respuesta-> fetch_assoc()){
        array_push($result, $fila);
    }
}else {
    $result = null;
}

$resultJSON = json_encode($result);
echo $resultJSON;

?>