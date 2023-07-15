<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<script>
    $(document).ready(function () {
        $('#login').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Retrieve form data
            var formData = $(this).serialize();

            // Send the form data using AJAX
            $.ajax({
                type: 'POST',
                url: "http://laboratoriosad.000webhostapp.com/login.php",
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response == null) {
                        alert("Los datos ingresados no son correctos");
                    } else {
                        var jsonResponse = response;

                        // Acceder al primer elemento del arreglo JSON
                        var usuario = jsonResponse[0];

                        // Acceder a las propiedades del objeto JSON
                        var idUsuario = usuario.ID_Usuario;
                        var nombre = usuario.Nombre;
                        var apellido = usuario.Apellido;
                        var cedula = usuario.Cedula;
                        var rol = usuario.Rol;
                        if (rol == 1) {
                            location.href = "sesion.php?id="+idUsuario+"&nombre="+nombre+"&apellido="+apellido;

                        } else {
                            alert("Error de autenticacion");
                        }
                    }

                },
                error: function (xhr, status, error) {
                    // Handle the error case
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>



<body class="bodyBack">
    <div class="divFormulario">
        <form id="login" class="formularioLogin" method="POST">
            <div class="divTituloLogin">
                <h3>Sistema de Control de Prestamos de Equipos</h3>
            </div>
            <br>
            <div class="mb-3">
                <img src="img/user.png">
                <label for="usuario" class="form-label" style="font-weight:bold;">Usuario</label>
                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Ingrese su cedula"
                    required>
            </div>
            <div class="mb-3">
                <img src="img/password.png">
                <label for="clave" class="form-label" style="font-weight:bold">Contraseña</label>
                <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su contraseña"
                    required>
            </div>
            <div>
                <button type="submit" class="form-control" id="envio" name="envio"
                    style="background-color:#192841; color:white">Ingresar</button>
            </div>
        </form>
    </div>

</body>

</html>