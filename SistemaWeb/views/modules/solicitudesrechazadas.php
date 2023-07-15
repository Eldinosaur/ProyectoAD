<!DOCTYPE html>
<html>

<body>
    <div class="divFormulario">
        <label for="destination" class="form-label">Filtrar por tipo de solicitud</label>
        <select id="destination" class="form-control" name="destination">
            <option value="redireccion.php?action=solicitudesrechazadas">Rechazadas</option>
            <option value="redireccion.php?action=solicitudes">Todas</option>
            <option value="redireccion.php?action=solicitudesaprobadas">Aprobadas</option>
            <option value="redireccion.php?action=solicitudespendientes">Pendientes</option>

        </select>
        <p>Rechazadas</p>
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