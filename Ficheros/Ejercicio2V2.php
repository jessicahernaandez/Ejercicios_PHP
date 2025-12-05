<?php

    $titulo = "Directorios";
    include("cabecera.inc.php");

    $directorio = "."; //actual

    $arrDirectorios = scandir($directorio);

    echo "Directorios en 'Ficheros': <br />";
    foreach($arrDirectorios as $key => $value) {
        if($value != "..") {
            if($value == ".") {
                echo "<a href = '$value'>Regresa al directorio anterior</a><br />";
            } else {
                echo "<a href ='$value'>$value</a><br />";
                
            }
        }
    }
    $direcotioActual = getcwd();
    //echo "<a href=$direcotioActual>Regrese al directorio anterior</a>";
    echo "<br />";
    include("pie.inc.php");


?>