<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlacesModel)
    {
        if (
            $enlacesModel == "equipos" ||
            $enlacesModel == "nuevoequipo" ||
            $enlacesModel == "usuarios" ||
            $enlacesModel == "nuevousuario" ||
            $enlacesModel == "solicitudes" ||
            $enlacesModel == "solicitudesaprobadas" ||
            $enlacesModel == "solicitudespendientes" ||
            $enlacesModel == "solicitudesrechazadas" ||
            $enlacesModel == "solicitudescanceladas" ||
            $enlacesModel == "solicitudesfinalizadas" ||
            $enlacesModel == "devoluciones" ||
            $enlacesModel == "devolucionespendientes" ||
            $enlacesModel == "devolucionesrecibidas"
        ) {
            $module = "views/modules/" . $enlacesModel . ".php";
        } else {
            $module = "views/modules/home.php";
        }
        return $module;
    }
}
?>