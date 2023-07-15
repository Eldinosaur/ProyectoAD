<!DOCTYPE html>
<html>
<body>
<div class="divFormulario">
  <label for="destination" class="form-label">Filtrar por estado de devolucion</label>
  <select id="destination" class="form-control" name="destination">
    <option value="redireccion.php?action=devolucionespendientes">Pendientes</option>
    <option value="redireccion.php?action=devoluciones">Todas</option>
    <option value="redireccion.php?action=devolucionesrecibidas">Finalizadas</option>
  </select>
<p>Pendientes</p>
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
