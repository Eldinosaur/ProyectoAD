<?php
$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
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
                url: "https://laboratoriosad.000webhostapp.com/cambiarClaveUsuario.php",
                data: formData,
                success: function (response) {
                    console.log(response);
                    alert("Datos Registrados con Exito");
                    location.href = "redireccion.php?action=usuarios";

                },
                error: function (xhr, status, error) {
                    // Handle the error case
                    console.log(xhr.responseText); // Example: Log the error response to the browser console
                    alert("No se Pudieron Registrar los Datos");
                    location.href = "redireccion.php?action=usuarios";
                }
            });
        });
    });
    function redirectToBuses() {
        window.location.href = 'redireccion.php?action=usuarios';
    }
</script>

<body>
    <div class="divFormulario">
        <div class="divTituloLogin">
            <h4>Informacion del usuario</h4>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $cedula ?>
                        </td>
                        <td>
                            <?php echo $nombre ?>
                        </td>
                        <td>
                            <?php echo $apellido ?>
                        </td>
                        <td>
                            <?php if ($rol == 2) {
                                echo "Estudiante";
                            } else if ($rol == 3) {
                                echo "Profesor";
                            } ?>
                        </td>
                        <td>
                            <?php echo $telefono ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <form id="new">
            <input type="text" name="id" id="id" value="<?php echo $id?>" hidden>
            <div class="mb-3">
                <label for="clave" class="form-label" style="font-weight:bold;">Nueva Clave</label>
                <input type="text" class="form-control" name="clave" id="clave" placeholder="Nueva Clave" required>
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