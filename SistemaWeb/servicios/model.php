<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlacesModel)
    {
        if (
            $enlacesModel == "equipos" ||
            $enlacesModel == "nuevoequipo" ||
            $enlacesModel == "editarequipo" ||
            $enlacesModel == "editarestadoequipo" ||
            $enlacesModel == "usuarios" ||
            $enlacesModel == "nuevousuario" ||
            $enlacesModel == "editarusuario" ||
            $enlacesModel == "editarclaveusuario" ||
            $enlacesModel == "solicitudes" ||
            $enlacesModel == "solicitudesaprobadas" ||
            $enlacesModel == "solicitudespendientes" ||
            $enlacesModel == "solicitudesrechazadas" ||
            $enlacesModel == "solicitudescanceladas" ||
            $enlacesModel == "solicitudesfinalizadas" ||
            $enlacesModel == "editarestadosolicitud" ||
            $enlacesModel == "devoluciones" ||
            $enlacesModel == "devolucionespendientes" ||
            $enlacesModel == "devolucionesrecibidas" ||
            $enlacesModel == "editarestadodevolucion"
        ) {
            $module = "views/modules/" . $enlacesModel . ".php";
        } else {
            $module = "views/modules/home.php";
        }
        return $module;
    }
}
?>