<div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
<table class="table table-striped">
<thead>
<tr>
    <th scope="col">N°</th>
    <th scope="col">Cultivo</th>
    <th scope="col">Temperatura Mínima</th>
    <th scope="col">Temperatura Máxima</th>
    <th scope="col">Humedad Mínima</th>
    <th scope="col">Humedad Máxima</th>
    <th scope="col">Fecha de Registro</th>
    <th scope="col">Temperatura Actual</th>
    <th scope="col">Humedad Actual</th>
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
                    $id_equipo=$val[$i]['ID_Equipo'];

      ?>
    <tr>
        
        
        </tr>
    <?php   
    }}else{
    ?>
    <tr>
        <td colspan="3">No existen invernaderos registrados</td>
    </tr>
    <?php
    }?>
</tbody>
</table>

</div>