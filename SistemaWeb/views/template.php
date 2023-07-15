<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCPE</title>    
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="easyui/jquery.min.js"></script>
    <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bodyBack">
            <div class="container-fluid">
                <a class="navbar-brand" href="redireccion.php?action=home"> 
                    <img src="img/pc.png" class="avatar"> </a>  
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="redireccion.php?action=home">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="redireccion.php?action=home">Equipos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="redireccion.php?action=home">Usuarios</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="redireccion.php?action=home">Solicitudes</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="redireccion.php?action=home">Devoluciones</a>
                        </li>
                    </ul>
                    <div style="color:white">
                    <p>Bienvenido:</p>
                    <?php
                        echo $_SESSION['nombre']." ".$_SESSION['apellido'];
                        ?>
                        </div>              
                <button type="button" class="btn btn-danger" id="btnLogout">Logout</button>
            </div>
        </nav>
    </div>
    <section>
<?php
$mvc = new MvcController();
$mvc-> enlacesPaginasController();
?>
    </section>

    <footer class="bodyBack" style="color: white;text-align:center; position: fixed;bottom: 0px;width: 100%;height: 35px;">
  <p ><b>Copyright © 2023 |  SCPE  | Todos los Derechos Reservados </b> </p>
</footer>
</body>


</html>
<script>
    var boton = document.getElementById("btnLogout");
    boton.onclick = function() {
        window.location = "logout.php";        
    }
</script>