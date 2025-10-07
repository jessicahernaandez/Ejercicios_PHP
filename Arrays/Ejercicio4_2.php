<?php 
    //Genera un programa que ordene un array según su número de índice
    $intArrNotas = [3,5,8,10,5,3];

    echo "Array inicial:" . "<br />";
    print_r($intArrNotas);
    echo "<br />";
    echo "<br />";

    //Nos cargamos 2 valores, los indices (claves, quedan desordenados)
    unset($intArrNotas[3]);
    unset($intArrNotas[0]);

    echo "Array sin los dos valores eliminador: " . "<br />";
    print_r($intArrNotas);
    echo "<br />";
    echo "<br />";

    //Insertamos dos notas mas
    echo "Ingresando dos notas mas..." . "<br/>";
    $intArrNotas[3] = 9;
    $intArrNotas[0] = 1;
    print_r($intArrNotas);
    echo "<br />";
    echo "<br />";

    //Ordenamos el array segun numero de indice.
    echo "Array ordenado: " . "<br />";
    sort($intArrNotas, SORT_NATURAL);
    print_r($intArrNotas);

    
    
?>