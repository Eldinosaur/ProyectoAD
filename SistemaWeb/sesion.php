<?php

session_start();
$_SESSION['id']=$_GET['id'];
$_SESSION['nombre']=$_GET['nombre'];
$_SESSION['apellido'] = $_GET['apellido'];

header("Location: redireccion.php");
exit;
?>