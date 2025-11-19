<?php 

    $titulo = "Triangulo mas";
    include("cabecera.inc.php");

    $strArrPersonas = array(
        array("Nombre" => "Pepe", "Edad" => 25),
        array("Nombre" => "María", "Edad" => 20));

        foreach($strArrPersonas as $strPersonas) {
            foreach($strPersonas as $key => $strPersona)  {
                echo "$key: $strPersona<br/>";
            }
        }

    include("pie.inc.php");

?>