<!DOCTYPE html>
<html>

<body>

    <div class="divFormulario">
        <label for="destination" class="form-label">Filtrar por estado de solicitud</label>
        <select id="destination" class="form-control" name="destination">
            <option value="redireccion.php?action=solicitudesfinalizadas">Finalizadas</option>
            <option value="redireccion.php?action=solicitudes">Todas</option>
            <option value="redireccion.php?action=solicitudesaprobadas">Aprobadas</option>
            <option value="redireccion.php?action=solicitudespendientes">Pendientes</option>
            <option value="redireccion.php?action=solicitudesrechazadas">Rechazadas</option>
            <option value="redireccion.php?action=solicitudescanceladas">Canceladas</option>
        </select>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N° Solicitud</th>
                    <th scope="col">Tecnico Responsable</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Equipo Solicitado</th>
                    <th scope="col">Estado de la Solicitud</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $url = 'http://laboratoriosad.000webhostapp.com/listarSolicitudesFinalizadas.php';
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
                            $id_solicitud = $item['ID_Solicitud'];
                            $id_tecnico_aprueba = $item['ID_Tecnico_Aprueba'];
                            $id_solicitante = $item['ID_Solicitante'];
                            $id_equipo_solicita = $item['ID_Equipo_Solicita'];
                            $estado_solicitud = $item['Estado_Solicitud'];
                            $observacion_solicitud = $item['Observacion_Solicitud'];
                            $tecnico = $item['tecnico'];
                            $solicitante = $item['solicitante'];
                            $equipo = $item['equipo'];

                            // Output the table row
                            ?>
                            <tr>
                                <td>
                                    <?php echo $id_solicitud ?>
                                </td>
                                <td>
                                    <?php echo $tecnico ?>
                                </td>
                                <td>
                                    <?php echo $solicitante ?>
                                </td>
                                <td>
                                    <?php echo $equipo ?>
                                </td>
                                <td>
                                    <?php
                                    if ($estado_solicitud == 1) {
                                        echo "Aprobada";
                                    } elseif ($estado_solicitud == 2) {
                                        echo "Rechazado";
                                    } elseif ($estado_solicitud == 3) {
                                        echo "Pendiente Aprobación";
                                    } elseif ($estado_solicitud == 4) {
                                        echo "Cancelado";
                                    } elseif ($estado_solicitud == 5) {
                                        echo "Cerrado";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                <tr>
                    <td colspan="5">No existen solicitudes registradas</td>
                </tr>
                <?php
                    }
                } else {
                    ?>
                <tr>
                    <td colspan="5">Error al cargar las solicitudes</td>
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