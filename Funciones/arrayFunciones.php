<?php 

    $titulo = "Biblioteca";
    include("cabecera.inc.php");

    include("biblioteca.inc.php");

    $arrayFunciones = ["suma", "resta", "multiplicacion", "division"];

    if(isset($_GET["numero1"]) && isset($_GET["numero2"])) {
        $numero1 = $_GET["numero1"];
        $numero2 = $_GET["numero2"];

        foreach($arrayFunciones as $indice => $nombreFuncion) {
            echo "La $nombreFuncion de $numero1 y $numero2 es: " . $nombreFuncion($numero1, $numero2) . "<br>";
        }
    }

?>