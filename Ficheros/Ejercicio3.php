<?php 

    $titulo="Archivo Configuracion";
    include("cabecera.inc.php");

    if(is_uploaded_file($_FILES["archivoConfiguracion"]["name"])){
        $archivoRecibido = $_FILES["archivoConfiguracion"]["name"];
    }

    echo "<br />";
    include("pie.inc.php");

?>