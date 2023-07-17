<?php
$id_solicitud = $_POST['id_solicitud'];
$estado = $_POST['estado'];
$observacion = $_POST['observacion'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<script>

    function redirectToBuses() {
        window.location.href = 'redireccion.php?action=devoluciones';
    }
</script>

<body>
    <div class="divFormulario" style="text-align:justify">
        <div style="text-align:center">
            <h4>Informacion de la solicitud</h4>
        </div>
        <div>
            <div class="mb-3">
                <label for="solicitud" class="form-label" style="font-weight:bold;">N° Solicitud</label>
                <p class="form-label" name="solicitud">
                    <?php echo $id_solicitud ?>
                </p>
            </div>
            <div class="mb-3">
                <label for="solicitud" class="form-label" style="font-weight:bold;">Estado de la Solicitud</label>
                <p class="form-label" name="solicitud">
                    <?php
                    if ($estado == 1) {
                        echo "Aprobada";
                    } elseif ($estado == 2) {
                        echo "Pendiente";
                    } 
                    ?>
                </p>
            </div>
            <div class="mb-3">
                <label for="solicitud" class="form-label" style="font-weight:bold;">Observacion</label>
                <p class="form-label" name="solicitud">
                    <?php echo $observacion ?>
                </p>
            </div>
            <div>
                <button type="button" class="btn" style="color:white; background-color:#b30000;"
                    onclick="redirectToBuses()">Regresar</button>
            </div>

        </div>
</body>