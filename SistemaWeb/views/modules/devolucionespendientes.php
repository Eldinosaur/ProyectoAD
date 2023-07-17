<!DOCTYPE html>
<html>
<body>
<div class="divFormulario">
<label for="destination" class="form-label">Filtrar por estado de devolucion</label>
    <select id="destination" class="form-control" name="destination">
      <option value="redireccion.php?action=devoluciones">Todas</option>
      <option value="redireccion.php?action=devolucionespendientes" selected>Pendientes</option>
      <option value="redireccion.php?action=devolucionesrecibidas">Finalizadas</option>
    </select>
  <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">N° Solicitud</th>
          <th scope="col">Tecnico Responsable</th>
          <th scope="col">Estado de la Solicitud</th>
          <th scope="col">Estado del Equipo</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $url = 'http://laboratoriosad.000webhostapp.com/listarDevolucionesPendientes.php';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        // ...
        
        if ($json != null) {
          $obj = json_decode($json);
          $val = json_decode(json_encode($obj), true);

          if (is_array($val) && count($val) > 0) {
            foreach ($val as $item) {
              // Retrieve the values from the $item array
              $id_devolucion = $item['ID_Devolucion'];
              $id_solicitud = $item['ID_Solicitud_Devolucion'];
              $estado_devolucion = $item['Estado_Devolucion'];
              $observacion = $item['Observacion_Devolucion'];

              // Output the table row
              ?>
              <tr>
                <td>
                  <?php echo $id_solicitud ?>
                </td>
                <td>
                  <?php echo "Pendiente";?>
                </td>
                <td>
                  <?php
                  switch($estado_devolucion){
                    case 1: echo "Pendiente"; break;
                    case 2: echo "Finalizada"; break;
                  }
                  ?>
                </td>
                <td>
                  <?php echo "Pendiente";?>
                </td>
              </tr>
              <?php
            }
          } else {
            ?>
        <tr>
          <td colspan="5"><center>No existen solicitudes registradas</center></td>
        </tr>
        <?php
          }
        } else {
          ?>
        <tr>
          <td colspan="5"><center>Error al cargar las solicitudes</center></td>
        </tr>
        <?php
        }
        // ...
        ?>

      </tbody>
    </table>
</div>
</body>
<script>
    // Get the select element
    const destinationSelect = document.getElementById('destination');

    // Function to handle the redirect
    function redirectToPage() {
      // Get the selected value
      const selectedValue = destinationSelect.value;

      // Check if a valid option is selected
      if (selectedValue !== '') {
        // Redirect to the selected page
        window.location.href = selectedValue;
      }
    }

    // Listen for the change event on the select element
    destinationSelect.addEventListener('change', redirectToPage);
  </script>
</html>
