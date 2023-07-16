<div class="divFormulario">
    <a class="nav-link active; navTemplate" title="Agregar Equipo" href="redireccion.php?action=nuevoequipo">
        <img src="img/plus.png" class="icons" style="height:20px;">
        Nuevo Equipo
    </a>
    <br>
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
            <?php
            $url = 'http://laboratoriosad.000webhostapp.com/listarEquipos.php';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            if ($json != null) {
                $obj = json_decode($json);
                $val = json_decode(json_encode($obj), true);
                for ($i = 0; $i < sizeof($val); $i++) {
                    $id_equipo = $val[$i]['ID_Equipo'];
                    $nombre_equipo = $val[$i]['Nombre'];
                    $marca_equipo = $val[$i]['Marca'];
                    $detalle_equipo = $val[$i]['Detalle'];
                    $precio_equipo = $val[$i]['Precio_Adquisicion'];
                    $estado_equipo = $val[$i]['Estado_Equipo'];
                    $codigo_equipo = $val[$i]['Codigo_Equipo'];
                    $url_imagen = $val[$i]['url_imagen'];

                    ?>
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
                    <?php
                }
            } else {
                ?>
            <tr>
                <td colspan="3">No existen invernaderos registrados</td>
            </tr>
            <?php
            } ?>
        </tbody>
    </table>

</div>