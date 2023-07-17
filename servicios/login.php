<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once 'conexionBD.php';

$cedula = $_POST['cedula'];
$clave = $_POST['clave'];


$sql= "SELECT * FROM usuarios WHERE Cedula='$cedula' AND Clave='$clave'";

$respuesta = $conection -> query ($sql);
    $result = array();

    if ( $respuesta -> num_rows > 0 ){
        while ( $fila = $respuesta-> fetch_assoc()){
            array_push($result, $fila);
        }
    }else{
        $result=null;
    }

$resultJSON = json_encode($result);
echo $resultJSON;
//return $resultJSON;
?>