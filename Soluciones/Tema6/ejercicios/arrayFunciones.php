<?php
    $titulo = "Prueba matematicas.inc.php";
    include("biblioteca.inc.php");

    $strArrFunciones = ['suma', 'resta', 'multiplica','divide'];
    $intAuxUno = 5;
    $intAuxDos = 4;

    foreach ($strArrFunciones as $strFuncion)
        echo "La $strFuncion de $intAuxUno y $intAuxDos es: ". $strFuncion($intAuxUno,$intAuxDos) ."<br>";

    include("pie.inc.html");
?>