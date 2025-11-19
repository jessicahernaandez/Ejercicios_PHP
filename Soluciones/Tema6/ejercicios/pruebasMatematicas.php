<?php
    $titulo = "Prueba matematicas.inc.php";
    include("matematicas.inc.php");
    echo "Número de digitos de 1234: " . (digitos(1234)) . "<br />";
    echo "Del número 4321: digito 2: " . (digitoN(4321,2)) . ", digito 4: " . (digitoN(4321,4)). "<br />";
    echo "Del número 4321: quita 2 dígitos por detras: " .  quitaPorDetras(  4321, 2). "<br />";
    echo "Del número 4321: quita 2 dígitos por detras2: " . quitaPorDetras2( 4321, 2). "<br />";
    echo "Del número 4321: quita 2 dígitos por delante: " . quitaPorDelante( 4321, 2). "<br />";
    echo "Del número 4321: quita 2 dígitos por delante: " . quitaPorDelante2(4321, 2). "<br />";
    include("pie.inc.html");
?>