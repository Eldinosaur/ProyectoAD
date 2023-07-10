<?php
class EnlacesPaginas{
    public static function enlacesPaginasModel ($enlacesModel){
        if($enlacesModel == "invernaderos" ||
            $enlacesModel == "registrarinvernadero" ){
                $module = "views/modules/".$enlacesModel.".php";
            }
            else {
                $module = "views/modules/home.php";
            }
            return $module;
    }
}
?>