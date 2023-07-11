<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once 'conexionBD.php';

$json=array();

	if(isset($_GET['cedula'])){
		$cedula=$_GET['cedula'];
				
		$consulta="SELECT clave FROM usuarios WHERE Cedula=".$cedula;
		$resultado=mysqli_query($conection,$consulta);
			
		while ($row = mysqli_fetch_row($resultado)) {
                 $json[]=$row[0];
            }
		
		mysqli_close($conection);
		echo json_encode($json);
	}
	else{
		$resulta["success"]=0;
		$resulta["message"]='Ws no Retorna';
		$json['cedula'][]=$resulta;
		echo json_encode($json);
	}
?>