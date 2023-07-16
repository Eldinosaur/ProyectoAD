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
        url: "https://laboratoriosad.000webhostapp.com/editarUsuario.php",
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
      <form id="new">
      <input type="text" name="id" id="id" value="<?php echo $id?>" hidden>
        <div class="mb-3">
            <label for="cedula" class="form-label" style="font-weight:bold;">Cedula</label>
            <input type="text" class="form-control" name="cedula" id="cedula" maxlength="10" value="<?php echo $cedula?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label" style="font-weight:bold;">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="" value="<?php echo $nombre?>" readonly>
          </div>
          <div class="mb-3">
            <label for="apellido" class="form-label" style="font-weight:bold;">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $apellido?>" readonly>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label" style="font-weight:bold;">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono?>" required>
          </div>
          <div class="mb-3">
            <label for="rol" class="form-label" style="font-weight:bold;">Rol</label>
            <select class="form-control" name="rol" id="rol">
                <option value="2" <?php if($rol == 2){echo 'selected';}?>>Estudiante</option>
                <option value="3" <?php if($rol == 3){echo 'selected';}?>>Docente</option>
            </select>    
        </div>
          <div>
            <button type="submit" class="btn" style="color: white; background-color:#152238;" id="envio"
              name="envio">Registrar</button>
            <button type="button" class="btn" style="color:white; background-color:#b30000;" onclick="redirectToBuses()">Cancelar</button>
          </div>
      </form>

    </div>
  </body>