<?php

    $intArrNotas = [1, 2, 3, 4]; 
    $chrArrUno=['a','b','c'];
    $chrArrDos=['d','e','f'];
    print_r($intArrNotas);
    var_dump($intArrNotas);
    echo 'Número elementos: ' . count($intArrNotas) . '<br /><br />';
    $intArrOtrasNotas = array_merge($intArrNotas, [5,6,7,8]);
    echo 'Número elementos de OtrasNotas: ' . count($intArrOtrasNotas) . '<br /> OtrasNotas: ';
    print_r($intArrOtrasNotas);
    echo '<br /><br /> ArrayUno: ';
    print_r($chrArrUno);
    echo '<br /> chrArrDos: ';
    print_r($chrArrDos);
    echo '><br /> array_merge(chrArrUno,chrArrDos) -> ArrayTres: ';
    $chrArrTres = array_merge($chrArrUno,$chrArrDos);
    print_r($chrArrTres);
    echo '<br /> ArrayTres con for [';
    for($intCont=0; $intCont<count($chrArrTres); $intCont++)
    echo " " . $chrArrTres[$intCont] . ',';
    echo ']';

    unset($chrArrTres[2]);//se elimina
    unset($chrArrTres[5]);//se elimina
    unset($chrArrTres[12]);//no hace nada
    echo '<br /><br />count: ' . count($chrArrTres) . ' ArrayTres: ';
    print_r($chrArrTres);//muestra el array sin la posición 2 ni la 5
    $chrArrTres[1]='y';//cambia el elemento y lo deja en la posición correcta
    $chrArrTres[2]='x';//mete la posición 2 al final del array
    echo '<br />count: ' . count($chrArrTres) . ' ArrayTres: ';
    print_r($chrArrTres);
    //El problema de utilizar unset($array[$posicion]), esque elimina la posicion y el indice y si volvemos a agregar un elemento en ese indice
    //lo elimina. Podemos solucionarlo con array_merge pero cambiaria los indcies, por lo que si el valoir esta asociado a indice, seria un problema.
    $chrArrTres=array_merge($chrArrTres);//cambia las posiciones para no dejar huecos. //array_pop($array) para borrar ultimo elemento del array.
    echo '<br />count: ' . count($chrArrTres) . ' ArrayTres: ';
    print_r($chrArrTres);

    //range(intInicial, intFinal[, rlnSalto]): rellena un array con valores entre los indicados con distancia entre un valor y otro
    // según lo indicado en rlnSalto. Los valores inicial y final se
    // pueden cambiar por caracteres y el salto tendrá que ser un
    // número real

    // shuffle($array): ordena un array de manera aleatoria

    //list($var1,..., $varN)=$array:asigna los valores de mun array a un conjunto de variables

?>