<?php 
    $strArrPersonas = array(
        array("Nombre" => "Pepe", "Edad" => 25),
        array("Nombre" => "Maria", "Edad" => 20) 
    );

    echo "Datos:<br>";
    foreach($strArrPersonas as $array) {
        foreach($array as $clave => $valor) {
            echo "$clave: $valor<br>";
        }
    }
?>