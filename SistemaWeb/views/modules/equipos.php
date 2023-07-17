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
                <th scope="col" colspan="2"><center>Acciones</center></th>
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
                        
                        <?php echo '
                        <td>
                            <form action ="redireccion.php?action=editarequipo" method="POST">
                            <input type="text" name="id_equipo" id="id_equipo" value="'.$id_equipo.'" hidden>
                            <input type="text" name="nombre_equipo" id="nombre_equipo" value="'.$nombre_equipo.'" hidden>
                            <input type="text" name="marca_equipo" id="marca_equipo" value="'.$marca_equipo.'" hidden>
                            <input type="text" name="detalle" id="detalle" value="'.$detalle_equipo.'" hidden>
                            <input type="text" name="precio" id="precio" value="'.$precio_equipo.'" hidden>
                            <input type="text" name="estado" id="estado" value="'.$estado_equipo.'" hidden>
                            <input type="text" name="url" id="url" value="'.$url_imagen.'" hidden>
                            <input type="text" name="codigo" id="codigo" value="'.$codigo_equipo.'" hidden>
                                <button type="submit" class="btn" title="Editar" style="border:none;">
                                    <img src="img/pencil.png" class ="icons">
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action ="redireccion.php?action=editarestadoequipo" method="POST">
                                <input type="text" name="id_equipo" id="id_equipo" value="'.$id_equipo.'" hidden>
                                <input type="text" name="nombre_equipo" id="nombre_equipo" value="'.$nombre_equipo.'" hidden>
                                <input type="text" name="marca_equipo" id="marca_equipo" value="'.$marca_equipo.'" hidden>
                                <input type="text" name="detalle" id="detalle" value="'.$detalle_equipo.'" hidden>
                                <input type="text" name="precio" id="precio" value="'.$precio_equipo.'" hidden>
                                <input type="text" name="estado" id="estado" value="'.$estado_equipo.'" hidden>
                                <input type="text" name="url" id="url" value="'.$url_imagen.'" hidden>
                                <input type="text" name="codigo" id="codigo" value="'.$codigo_equipo.'" hidden>
                                <button type="submit" class="btn" title="Editar" style="border:none;">
                                    <img src="img/status.png" class ="icons">
                                </button>
                            </form>
                        </td>
                    </tr>
                    ';
                }
            } else {
                ?>
            <tr>
                <td colspan="10">
                    <center>No existen equipos registrados o Hubo un error al cargar los datos</center>
                </td>
            </tr>
            <?php
            } ?>
        </tbody>
    </table>

</div>