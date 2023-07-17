<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexionBD.php';
 $id_usuario=$_POST['id_usuario'];
 $id_equipo = $_POST['id_equipo'];


$result = false;

    $sqlInsertInvernadero = "INSERT INTO `solicitudes`(`ID_Solicitante`, `ID_Equipo_Solicita`, `Estado_Solicitud`, `Observacion_Solicitud`) VALUES ('{$id_usuario}','{$id_equipo}','3','Prestamo Equipo')";
    if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
        $result = true;
    } else {
        echo json_encode("error " . $sqlinsertar . $mysqli->error);
    }


$mysqli->close();
echo $result;
?>