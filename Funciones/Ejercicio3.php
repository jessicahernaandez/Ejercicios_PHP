<?php

    $titulo = "Parametros Variables";
    include("cabecera.inc.php");

    include("matematicas.inc.php");

    echo "Cuantos digitos tiene '12876': " . digitos(12876);

    echo "<br>Que digito se encuentra en la posicion 2: " . digitoN(12864, 2);

    echo "<br>Al numero 12876 quiero quitarle los 3 ultimos digitos: " . quitaPorDetras(12876, 4);

    echo "<br>Al numero 12876 quiero quitarle los primeros 3 digitos: " . quitaPorDelante(12876, 3);

    include("pie.inc.php");




?>