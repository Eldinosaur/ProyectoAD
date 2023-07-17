<div class="divFormulario">
    <a class="nav-link active; navTemplate" title="Agregar Usuario" href="redireccion.php?action=nuevousuario">
        <img src="img/plus.png" class="icons" style="height:20px;">
        Nuevo Usuario
    </a>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Rol</th>
                <th scope="col" colspan="2"><center>Acciones</center></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $url = 'http://laboratoriosad.000webhostapp.com/listarUsuarios.php';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            if ($json != null) {
                $obj = json_decode($json);
                $val = json_decode(json_encode($obj), true);
                for ($i = 0; $i < sizeof($val); $i++) {
                    $id_usuario = $val[$i]['ID_Usuario'];
                    $nombre_usuario = $val[$i]['Nombre'];
                    $apellido_usuario = $val[$i]['Apellido'];
                    $cedula_usuario = $val[$i]['Cedula'];
                    $rol_usuario = $val[$i]['Rol'];
                    $telefono_usuario = $val[$i]['Telefono'];
                    ?>
                    <tr>
                        <td>
                            <?php echo $cedula_usuario ?>
                        </td>
                        <td>
                            <?php echo $nombre_usuario ?>
                        </td>
                        <td>
                            <?php echo $apellido_usuario ?>
                        </td>
                        <td>
                            <?php if ($rol_usuario == 2) {
                                echo "Estudiante";
                            } else if ($rol_usuario == 3) {
                                echo "Docente";
                            } ?>
                        </td>
                    
                    <?php echo'
                        <td>
                        <form action ="redireccion.php?action=editarusuario" method="POST">
                        <input type="text" name="id" id="id" value="'.$id_usuario.'" hidden>
                        <input type="text" name="cedula" id="cedula" value="'.$cedula_usuario.'" hidden>
                        <input type="text" name="nombre" id="nombre" value="'.$nombre_usuario.'" hidden>
                        <input type="text" name="apellido" id="apellido" value="'.$apellido_usuario.'" hidden>
                        <input type="text" name="telefono" id="telefono" value="'.$telefono_usuario.'" hidden>
                        <input type="text" name="rol" id="rol" value="'.$rol_usuario.'" hidden>
                            <button type="submit" class="btn" title="Editar" style="border:none;">
                                <img src="img/pencil.png" class ="icons">
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action ="redireccion.php?action=editarclaveusuario" method="POST">
                        <input type="text" name="id" id="id" value="'.$id_usuario.'" hidden>
                        <input type="text" name="cedula" id="cedula" value="'.$cedula_usuario.'" hidden>
                        <input type="text" name="nombre" id="nombre" value="'.$nombre_usuario.'" hidden>
                        <input type="text" name="apellido" id="apellido" value="'.$apellido_usuario.'" hidden>
                        <input type="text" name="telefono" id="telefono" value="'.$telefono_usuario.'" hidden>
                        <input type="text" name="rol" id="rol" value="'.$rol_usuario.'" hidden>
                            <button type="submit" class="btn" title="Editar" style="border:none;">
                                <img src="img/editpw.png" class ="icons">
                            </button>
                        </form>
                    </td>
                    </tr>
                    ';
                }
            } else {
                ?>
            <tr>
                <td colspan="3"><center>No existen usuarios registrados</center></td>
            </tr>
            <?php
            } ?>
        </tbody>
    </table>

</div>