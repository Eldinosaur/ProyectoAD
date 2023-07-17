<?php
$id_solicitud = $_POST['id_solicitud'];
$solicitante = $_POST['solicitante'];
$equipo = $_POST['equipo'];
$id_equipo = $_POST['id_equipo'];
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
    $(document).ready(function () {
        $('#new').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Retrieve form data
            var formData = $(this).serialize();

            // Send the form data using AJAX
            $.ajax({
                type: 'POST',
                url: "https://laboratoriosad.000webhostapp.com/editarEstadoSolicitud.php",
                data: formData,
                success: function (response) {
                    console.log(response);
                    alert("Datos Registrados con Exito");
                    location.href = "redireccion.php?action=solicitudes";

                },
                error: function (xhr, status, error) {
                    // Handle the error case
                    console.log(xhr.responseText); // Example: Log the error response to the browser console
                    alert("No se Pudieron Registrar los Datos");
                    location.href = "redireccion.php?action=solicitudes";
                }
            });
        });
    });
    function redirectToBuses() {
        window.location.href = 'redireccion.php?action=solicitudes';
    }
</script>

<body>
    <div class="divFormulario">
        <div style="text-align:center;">
            <h4>Informacion de la Solicitud</h4>
        </div>
        <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N° Solicitud</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Equipo Solicitado</th>
                    <th scope="col">Estado de la Solicitud</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                                <td>
                                    <?php echo $id_solicitud ?>
                                </td>
                                <td>
                                    <?php echo $solicitante ?>
                                </td>
                                <td>
                                    <?php echo $equipo ?>
                                </td>
                                <td>
                                    <?php
                                    if ($estado == 1) {
                                        echo "Aprobada";
                                    } elseif ($estado== 2) {
                                        echo "Rechazado";
                                    } elseif ($estado== 3) {
                                        echo "Pendiente Aprobación";
                                    } elseif ($estado == 4) {
                                        echo "Cancelado";
                                    } elseif ($estado == 5) {
                                        echo "Cerrado";
                                    }
                                    ?>
                                </td>
                            </tr>
                            
            </tbody>
        </table>

                </tbody>
            </table>
        </div>
        <form id="new">
            <input type="text" name="id" id="id" value="<?php echo $id_solicitud?>" hidden>
            <input type="text" name="aprueba" id="aprueba" value="<?php echo $_SESSION['id']?>" hidden>
            
            <div class="mb-3">
                <label for="estado" class="form-label" style="font-weight:bold;">Estado de la Solicitud</label>
                <select class="form-control" name="estado" id="estado">
                    <option value="1" <?php if ($estado == 1) {
                        echo 'selected';
                    } ?>>Aprobado</option>
                    <option value="2" <?php if ($estado == 2) {
                        echo 'selected';
                    } ?>>Rechazado</option>
                    <option value="3" <?php if ($estado == 3) {
                        echo 'selected';
                    } ?>>Pendiente </option>
                    <option value="4" <?php if ($estado == 4) {
                        echo 'selected';
                    } ?>>Cancelado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="observacion" class="form-label" style="font-weight:bold;">Observacion</label>
                <input type="text" class="form-control" name="observacion" id="observacion" placeholder="Observacion" required>
            </div>            
            <div>
                <button type="submit" class="btn" style="color: white; background-color:#152238;" id="envio"
                    name="envio">Registrar</button>
                <button type="button" class="btn" style="color:white; background-color:#b30000;"
                    onclick="redirectToBuses()">Cancelar</button>
            </div>
        </form>

    </div>
</body>