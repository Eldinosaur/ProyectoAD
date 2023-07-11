<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexionBD.php';
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$rol = $_POST['rol'];
$telefono = $_POST['telefono'];
$clave = $_POST['clave'];


$result = false;

    $sqlInsertInvernadero = "INSERT INTO `usuarios`(`Nombre`, `Apellido`, `Cedula`, `Rol`, `Telefono`, `Clave`) VALUES ('".$nombre."','".$apellido."','".$cedula."','".$rol."','".$telefono."','".$clave."')";
    if ($mysqli->query($sqlInsertInvernadero) === TRUE) {
        $result = true;
    } else {
        echo json_encode("error " . $sqlinsertar . $mysqli->error);
    }


$mysqli->close();
echo $result;
?>