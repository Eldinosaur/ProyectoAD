<?php
session_start();
require_once "controllers/controller.php";
require_once "servicios/model.php";

$mvc = new MvcController();
$mvc -> plantilla(); 
?>