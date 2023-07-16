<?php
$id_equipo = $_POST['id_equipo'];
$nombre_equipo = $_POST['nombre_equipo'];
$marca_equipo = $_POST['marca_equipo'];
$detalle = $_POST['detalle'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];
$url = $_POST['url'];
$codigo = $_POST['codigo'];
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
                url: "https://laboratoriosad.000webhostapp.com/editarEstadoEquipo.php",
                data: formData,
                success: function (response) {
                    console.log(response);
                    alert("Datos Registrados con Exito");
                    location.href = "redireccion.php?action=equipos";

                },
                error: function (xhr, status, error) {
                    // Handle the error case
                    console.log(xhr.responseText); // Example: Log the error response to the browser console
                    alert("No se Pudieron Registrar los Datos");
                    location.href = "redireccion.php?action=equipos";
                }
            });
        });
    });
    function redirectToBuses() {
        window.location.href = 'redireccion.php?action=equipos';
    }
</script>

<body>
    <div class="divFormulario">
        <div class="divTituloLogin">
            <h4>Informacion del equipo</h4>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Codigo Equipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $codigo_equipo ?>
                        </td>
                        <td>
                            <?php echo $nombre_equipo ?>
                        </td>
                        <td>
                            <?php echo $marca_equipo ?>
                        </td>
                        <td>
                            <?php if ($estado_equipo == 1) {
                                echo "Disponible";
                            } else if ($estado_equipo == 2) {
                                echo "En Mantenimiento";
                            } else if ($estado_equipo == 3) {
                                echo "Dañado";
                            } else if ($estado_equipo == 4) {
                                echo "Bloqueado";
                            } else if ($estado_equipo == 5) {
                                echo "Prestado";
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form id="new">
            <input type="text" name="id" id="id" value="<?php echo $id_equipo ?>" hidden>
            
            <div class="mb-3">
                <label for="estado" class="form-label" style="font-weight:bold;">Estado del Equipo</label>
                <select class="form-control" name="estado" id="estado">
                    <option value="1" <?php if ($estado == 1) {
                        echo 'selected';
                    } ?>>Funcional</option>
                    <option value="2" <?php if ($estado == 2) {
                        echo 'selected';
                    } ?>>En Mantenimiento</option>
                    <option value="3" <?php if ($estado == 3) {
                        echo 'selected';
                    } ?>>Dañado</option>
                    <option value="4" <?php if ($estado == 4) {
                        echo 'selected';
                    } ?>>Bloqueado</option>
                </select>
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