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
    /*echo "Array ordenado: " . "<br />";
    sort($intArrNotas, SORT_NATURAL);
    print_r($intArrNotas);*/

    echo "Array ordenado con foreach: ";
    echo "<br />";

    //Ordenar el array por las claves (índices) de menor a mayor.
    //Recorremos los índices y los ordenamos.
    $claves = array_keys($intArrNotas);
    $elementos = count($claves);

    // Algoritmo burbuja para ordenar las claves
    for ($num = 0; $num < $elementos - 1; $num++) {
        for ($numOtro = 0; $numOtro < $elementos - $num - 1; $numOtro++) {
            if ($claves[$numOtro] > $claves[$numOtro + 1]) {
                $temp = $claves[$numOtro];
                $claves[$numOtro] = $claves[$numOtro + 1];
                $claves[$numOtro + 1] = $temp;
            }
        }
    }

?>